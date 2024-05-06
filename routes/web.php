<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\post_controler;
use App\Http\Controllers\PostController;
use App\Http\Controllers\profil_controller;
use App\Http\Controllers\RegisterControler;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('proses_login', [LoginController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::resource('user', AdminController::class);
    });
});


Route::get('register', function () {
    return view('register/index');
})->name('register');

Route::post('registeer', [RegisterControler::class, 'register'])->name('registeer');
Route::post('login', [RegisterControler::class, 'login'])->name('login');

route::get('/upload', function (){
    return view('dasboard/upload');
} )->name('to_upload');

Route::post('uploads', [PostController::class, 'upload'])->name('uploads');

Route::get('Profile',[profil_controller::class,'profil'])->name('profile');

Route::post('like', [LikeController::class, 'likePost'])->name('likepost');

Route::post('comment', [commentController::class, 'comment'])->name('commentdata');

Route::post('edit_profil',[profil_controller::class,'edit_profil'])->name('edit_profil');

