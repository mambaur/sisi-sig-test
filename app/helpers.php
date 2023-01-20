<?php

use App\Models\Menu;
use App\Models\User;
use App\Models\UserFoto;

if (!function_exists('getUserPhoto')) {
    function getUserPhoto()
    {
        $user_foto = UserFoto::where('user_id', auth()->user()->id)->first();
        return @$user_foto->foto ? asset('storage/' . @$user_foto->foto) : null;
    }
}

if (!function_exists('menusSideBar')) {
    function menusSideBar()
    {
        $result = [];
        $menus = Menu::all();

        foreach ($menus as $item) {

            $menu_child = Menu::where('parent_id', $item->id)->latest()->get();

            $child = [];
            foreach ($menu_child as $row) {
                $child[] = [
                    "id" => $row->id,
                    "name" => $row->menu_name,
                    "link" => $row->menu_link,
                    "icon" => $row->menu_icon ? asset('storage/' . $row->menu_icon) : "https://cdn-icons-png.flaticon.com/512/9445/9445360.png"
                ];
            }

            $result[] = [
                "id" => $item->id,
                "name" => $item->menu_name,
                "link" => $item->menu_link,
                "child" => $child,
                "icon" => $item->menu_icon ? asset('storage/' . $item->menu_icon) : "https://cdn-icons-png.flaticon.com/512/9445/9445360.png"
            ];
        }

        return $result;
    }
}

if (!function_exists('getMenuAccessUser')) {
    function getMenuAccessUser()
    {
        $user = User::find(auth()->user()->id);
        $result = [];
        foreach (@$user->menus ?? [] as $item) {
            $result[] = $item->menu_id;
        }

        return $result;
    }
}
