<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\JenjangController;
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

// User Group

Route::get('beranda', [App\Http\Controllers\User\BerandaController::class,'index'])->name('user.beranda');
Route::get('mapel', [App\Http\Controllers\User\MapelController::class,'index'])->name('user.mapel');
Route::get('rbgame', [App\Http\Controllers\User\RBGameController::class,'index'])->name('user.rbgame');
Route::get('akun', [App\Http\Controllers\User\AkunController::class,'index'])->name('user.akun');

// User


Route::get('admin',function(){
    return view('admin.template.master');
});

Route::get('login', function () {
    return view('auth.login');
});

Route::get('register', function () {
    return view('auth.register');
});
// Route::resource('mapel',MapelController::class);
// Route::resource('kelas',KelasController::class);
Route::get('jenjang_kelas/{jenjang}',[KelasController::class,'kelas']);
Route::get('kelas_mapel/{kelas}',[MapelController::class,'mapel']);
Route::get('mapel_materi/{mapel}',[MateriController::class,'materi']);
Route::resource('materi',MateriController::class);
Route::resource('jenjang',JenjangController::class);

Route::post('postlogin',[AuthController::class,'postlogin']);
