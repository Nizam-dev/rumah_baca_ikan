<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\MapelController;
use App\Http\Controllers\admin\MateriController;
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

Route::get('/', function () {
    return view('user.beranda.beranda');
});
Route::get('admin', function () {
    return view('admin.template.master');
});

Route::get('login', function () {
    return view('auth.login');
});

Route::get('register', function () {
    return view('auth.register');
});
Route::resource('mapel',MapelController::class);
Route::resource('kelas',KelasController::class);
Route::resource('materi',MateriController::class);

Route::post('postlogin',[AuthController::class,'postlogin']);
