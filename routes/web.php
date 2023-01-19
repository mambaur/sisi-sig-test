<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('home');

    // Menu Levels
    Route::get('/menu-levels', [App\Http\Controllers\MenuLevelController::class, 'index'])->name('menu-level');
    Route::post('/menu-levels/create', [App\Http\Controllers\MenuLevelController::class, 'store'])->name('menu-level-post');
    Route::put('/menu-levels/edit/{id}', [App\Http\Controllers\MenuLevelController::class, 'update'])->name('menu-level-update');
    Route::delete('/menu-levels/delete/{id}', [App\Http\Controllers\MenuLevelController::class, 'destroy'])->name('menu-level-delete');

    // Menu
    Route::get('/menus', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
    Route::get('/menus/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu-create');
    Route::post('/menus/create', [App\Http\Controllers\MenuController::class, 'store'])->name('menu-post');
    Route::get('/menus/edit/{id}', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu-edit');
    Route::put('/menus/update/{id}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu-update');
    Route::delete('/menus/delete/{id}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu-delete');
});
