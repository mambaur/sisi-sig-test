<?php

namespace App\Http\Controllers;

use App\Models\MenuLevel;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MenuLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_levels = MenuLevel::latest()->get();
        return view('pages.menu-levels.index', compact('menu_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MenuLevel::create([
            "level" => $request->level
        ]);

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Menambahkan Menu Level baru dengan nama " . $request->level,
            "created_by" => auth()->user()->id
        ]);

        Alert::success('Berhasil', 'Menu level berhasil ditambahkan');
        return back();
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
        MenuLevel::find($id)->update([
            "level" => $request->level
        ]);

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Mengupdate Menu Level " . $request->level,
            "created_by" => auth()->user()->id
        ]);

        Alert::success('Berhasil', 'Menu level berhasil diupdate');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = MenuLevel::find($id);

        UserActivity::create([
            "user_id" => auth()->user()->id,
            "deskripsi" => "Menghapus Menu Level " . $level->level,
            "created_by" => auth()->user()->id
        ]);

        MenuLevel::destroy($id);
        Alert::success('Berhasil', 'Menu level berhasil dihapus');
        return back();
    }
}
