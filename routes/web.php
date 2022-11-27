<?php
// admin
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\JenjangController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\MapelController;
use App\Http\Controllers\admin\MateriController;
// user
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\User\MapelController as UserMapelController;
use App\Http\Controllers\User\RBGameController;
use App\Http\Controllers\User\AkunController;
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

Route::get('beranda', [BerandaController::class,'index'])->name('user.beranda');
Route::get('mapel', [UserMapelController::class,'index'])->name('user.mapel');
Route::get('rbgame', [RBGameController::class,'index'])->name('user.rbgame');
Route::get('akun', [AkunController::class,'index'])->name('user.akun');

// User


Route::get('admin',function(){
    return view('admin.template.master');
});

Route::get('login', [AuthController::class,'login'])->name('login');

Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('postlogin',[AuthController::class,'postlogin']);


// User Role
Route::middleware(['role:user'])->group(function () {

});


// Admin Role
Route::middleware(['role:admin'])->group(function () {

    Route::resource('admin-mapel',MapelController::class);
    // Route::resource('kelas',KelasController::class);
    Route::get('jenjang_kelas/{jenjang}',[KelasController::class,'kelas']);
    Route::get('kelas_mapel/{kelas}',[MapelController::class,'mapel']);
    Route::get('mapel_materi/{mapel}',[MateriController::class,'materi']);
    Route::resource('admin-materi',MateriController::class);
    Route::resource('admin-jenjang',JenjangController::class);
    Route::resource('admin-kelas',KelasController::class);
    Route::get('soal',function(){
        return view('admin.soal.viewsoal');
    });
    
    

});


