<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuLevel;
use App\Models\MenuUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Roziq",
            'email' => 'bauroziq@gmail.com',
            'password' => Hash::make('admin'),
            'status_user' => 'active'
        ]);

        $level1 = MenuLevel::create([
            "level" => "Superuser"
        ]);

        $level2 = MenuLevel::create([
            "level" => "User"
        ]);

        $menu1 = Menu::create([
            "id_level" => $level2->id,
            "menu_name" => "Dashboard",
            "menu_link" => url("/"),
            "created_by" => $user->id,
            "updated_by" => $user->id
        ]);

        $menu2 = Menu::create([
            "id_level" => $level1->id,
            "menu_name" => "Menu",
            "menu_link" => url("/") . "/menus",
            "created_by" => $user->id,
            "updated_by" => $user->id
        ]);

        $menu3 = Menu::create([
            "id_level" => $level1->id,
            "menu_name" => "Menu Level",
            "menu_link" => url("/") . "/menu-levels",
            "created_by" => $user->id,
            "updated_by" => $user->id
        ]);

        $menu4 = Menu::create([
            "id_level" => $level1->id,
            "menu_name" => "User",
            "menu_link" => url("/") . "/users",
            "created_by" => $user->id,
            "updated_by" => $user->id
        ]);

        $menu5 = Menu::create([
            "id_level" => $level1->id,
            "menu_name" => "Log Error",
            "menu_link" => url("/") . "/logs",
            "created_by" => $user->id,
            "updated_by" => $user->id
        ]);

        $menu6 = Menu::create([
            "id_level" => $level1->id,
            "menu_name" => "Activity User",
            "menu_link" => url("/") . "/activities",
            "created_by" => $user->id,
            "updated_by" => $user->id
        ]);

        MenuUser::create([
            "user_id" => $user->id,
            "menu_id" => $menu1->id,
            "updated_by" => $user->id
        ]);
        MenuUser::create([
            "user_id" => $user->id,
            "menu_id" => $menu2->id,
            "updated_by" => $user->id
        ]);
        MenuUser::create([
            "user_id" => $user->id,
            "menu_id" => $menu3->id,
            "updated_by" => $user->id
        ]);
        MenuUser::create([
            "user_id" => $user->id,
            "menu_id" => $menu4->id,
            "updated_by" => $user->id
        ]);
        MenuUser::create([
            "user_id" => $user->id,
            "menu_id" => $menu5->id,
            "updated_by" => $user->id
        ]);
        MenuUser::create([
            "user_id" => $user->id,
            "menu_id" => $menu6->id,
            "updated_by" => $user->id
        ]);
    }
}
