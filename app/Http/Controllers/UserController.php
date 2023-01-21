<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuUser;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\UserFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('pages.users.index', compact('users'));
    }

    public function activity()
    {
        $activities = UserActivity::latest()->get();
        return view('pages.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('pages.users.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'status_user' => 'required',
                'user_photo' => 'image|file|max:1192',
                'password' => ['required', 'string', 'confirmed']
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        $pathimage = null;
        if ($request->hasFile('user_photo')) {
            $image = $request->file('user_photo');
            $pathimage = $image->store('user_photo');
        }

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "status_user" => $request->status_user,
            "no_hp" => $request->no_hp,
            "wa" => $request->wa,
            "pin" => $request->pin,
            "password" => Hash::make($request->password),
            "created_by" => auth()->user()->id,
            "updated_by" => auth()->user()->id
        ]);

        if ($request->menus) {
            foreach ($request->menus as $item) {
                MenuUser::create([
                    "user_id" => $user->id,
                    "menu_id" => $item,
                    "updated_by" => $user->id,
                ]);
            }
        }

        if ($pathimage) {
            UserFoto::create([
                "user_id" => $user->id,
                "foto" => $pathimage,
                "created_by" => auth()->user()->id,
                "updated_by" => auth()->user()->id
            ]);
        }

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Menambahkan user baru dengan email " . $user->email,
            "created_by" => auth()->user()->id
        ]);

        DB::commit();

        Alert::success('Berhasil', 'User berhasil ditambahkan');
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'string', 'confirmed'],
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Mengubah password user dengan email " . $user->email,
            "created_by" => auth()->user()->id
        ]);

        Alert::success('Berhasil', 'Password berhasil diupdate');
        // return redirect()->route('user');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $menus = Menu::all();
        $menu_id = [];
        foreach (@$user->menus ?? [] as $item) {
            $menu_id[] = $item->menu_id;
        }

        if (!$user) {
            Alert::warning('Perhatian', 'User tidak ditemukan');
            return back();
        }

        return view('pages.users.edit', compact('user', 'menu_id', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'status_user' => 'required',
                'user_photo' => 'image|file|max:1192',
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        $user = User::find($id);
        $user_photo = UserFoto::where('user_id', $user->id)->first();

        $pathimage = @$user_photo->foto;
        if ($request->hasFile('user_photo')) {
            if (@$user_photo->foto) {
                Storage::delete(@$user_photo->foto);
            }
            $image = $request->file('user_photo');
            $pathimage = $image->store('user_photo');
        }

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "status_user" => $request->status_user,
            "no_hp" => $request->no_hp,
            "wa" => $request->wa,
            "pin" => $request->pin,
            "updated_by" => auth()->user()->id
        ]);

        MenuUser::where('user_id', $user->id)->delete();
        if ($request->menus) {
            foreach ($request->menus as $item) {
                MenuUser::create([
                    "user_id" => $user->id,
                    "menu_id" => $item,
                    "updated_by" => $user->id,
                ]);
            }
        }

        if ($pathimage) {
            if ($user_photo) {
                $user_photo->update([
                    "foto" => $pathimage,
                    "updated_by" => auth()->user()->id
                ]);
            } else {
                UserFoto::create([
                    "user_id" => $user->id,
                    "foto" => $pathimage,
                    "created_by" => auth()->user()->id,
                    "updated_by" => auth()->user()->id
                ]);
            }
        }

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Mengubah data user dengan email " . $user->email,
            "created_by" => auth()->user()->id
        ]);

        DB::commit();

        Alert::success('Berhasil', 'User berhasil diupdate');
        return back();
        // return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            Alert::warning('Perhatian', 'User tidak ditemukan');
            return back();
        }

        DB::beginTransaction();

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Menghapus data user dengan email " . $user->email,
            "created_by" => auth()->user()->id
        ]);

        if (@count(@$user->photos)) {
            foreach (@$user->photos as $item) {
                Storage::delete(@$item->foto);
                $item->delete();
            }
        }

        User::destroy($id);

        DB::commit();

        Alert::success('Berhasil', 'User berhasil dihapus');
        return redirect()->route('user');
    }
}
