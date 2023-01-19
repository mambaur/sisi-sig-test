<?php

use App\Models\UserFoto;

if (!function_exists('getUserPhoto')) {
    function getUserPhoto()
    {
        $user_foto = UserFoto::where('user_id', auth()->user()->id)->first();
        return @$user_foto->foto;
    }
}
