<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuLevel;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('pages.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = MenuLevel::latest()->get();
        $parents = Menu::whereNull('parent_id')->latest()->get();
        return view('pages.menus.create', compact('levels', 'parents'));
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
                'menu_name' => 'required',
                'id_level' => 'required',
                'menu_icon' => 'image|file|max:1192',
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $pathimage = null;
        if ($request->hasFile('menu_icon')) {
            $image = $request->file('menu_icon');
            $pathimage = $image->store('menu_icon');
        }

        Menu::create([
            "id_level" => $request->id_level,
            "menu_name" => $request->menu_name,
            "menu_link" => $request->menu_link,
            "menu_icon" => $pathimage,
            "parent_id" => $request->parent_id,
            "created_by" => auth()->user()->id,
            "updated_by" => auth()->user()->id
        ]);

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Menambahkan menu baru dengan nama " . $request->menu_name,
            "created_by" => auth()->user()->id
        ]);

        Alert::success('Berhasil', 'Menu berhasil ditambahkan');
        return redirect()->route('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $levels = MenuLevel::latest()->get();
        $parents = Menu::whereNull('parent_id')->latest()->get();
        $menu = Menu::find($id);

        if (!$menu) {
            Alert::warning('Perhatian', 'Menu tidak ditemukan');
            return back();
        }

        return view('pages.menus.edit', compact('menu', 'levels', 'parents'));
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
                'menu_name' => 'required',
                'id_level' => 'required',
                'menu_icon' => 'image|file|max:1192',
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $menu = Menu::find($id);

        $pathimage = $menu->menu_icon;
        if ($request->hasFile('menu_icon')) {
            Storage::delete(@$menu->menu_icon);
            $image = $request->file('menu_icon');
            $pathimage = $image->store('menu_icon');
        }

        $menu->update([
            "id_level" => $request->id_level,
            "menu_name" => $request->menu_name,
            "menu_link" => $request->menu_link,
            "menu_icon" => $pathimage,
            "parent_id" => $request->parent_id,
            "updated_by" => auth()->user()->id
        ]);

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Mengupdate menu " . $request->menu_name,
            "created_by" => auth()->user()->id
        ]);

        Alert::success('Berhasil', 'Menu berhasil diupdate');
        return redirect()->route('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            Alert::warning('Perhatian', 'Menu tidak ditemukan');
            return back();
        }

        DB::beginTransaction();

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Menghapus menu " . $menu->menu_name,
            "created_by" => auth()->user()->id
        ]);

        if (@$menu->menu_icon) {
            Storage::delete(@$menu->menu_icon);
        }
        Menu::destroy($id);

        DB::commit();

        Alert::success('Berhasil', 'Menu berhasil dihapus');
        return redirect()->route('menu');
    }
}
