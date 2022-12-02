<?php
// admin
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\JenjangController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\MapelController;
use App\Http\Controllers\admin\MateriController;
use App\Http\Controllers\admin\NamaGameController;
use App\Http\Controllers\admin\QuizGameController;
use App\Http\Controllers\admin\SoalController;
// user
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\User\MapelController as UserMapelController;
use App\Http\Controllers\User\RBGameController;
use App\Http\Controllers\User\AkunController;
use App\Http\Controllers\User\ProfileController;

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
    return redirect('login');
});

// User Group

// User


Route::get('admin',function(){
    return view('admin.template.master');
});

Route::get('login', [AuthController::class,'login'])->name('login');

Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('postlogin',[AuthController::class,'postlogin']);


// User Role
Route::middleware(['role:user'])->group(function () {
// User Role
Route::middleware(['role:user'])->group(function () {

    Route::get('beranda', [BerandaController::class,'index'])->name('user.beranda');
    Route::get('mapel', [UserMapelController::class,'index'])->name('user.mapel');
    Route::get('rbgame', [RBGameController::class,'index'])->name('user.rbgame');
    Route::get('akun', [AkunController::class,'index'])->name('user.akun');
    Route::get('kelas', [ProfileController::class,'kelas'])->name('user.kelas');
    Route::post('kelas', [ProfileController::class,'store'])->name('user.kelas.update');
    Route::get('get-kelas/{id}', [ProfileController::class,'get_kelas'])->name('user.get_kelas');
    Route::get('profile', [ProfileController::class,'profile'])->name('user.profile');
    Route::post('profile', [ProfileController::class,'profile_update'])->name('user.profile.update');

});
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
    Route::get('soal/{materi}',[SoalController::class,'viewsoal']);
    Route::get('tambahsoal',[SoalController::class,'tambahsoal']);
    Route::resource('kelolasoal',SoalController::class);
    Route::get('materi-soal/{materi}',[SoalController::class,'soal']);
    Route::get('kelolasoaldelete/{id}',[SoalController::class,'destroy']);

    Route::resource('admin-namagame',NamaGameController::class);
    Route::resource('quizgame',QuizGameController::class);
    Route::get('namagame-quizgame/{namagame}',[QuizGameController::class,'namagame']);
    Route::get('viewquizgame/{id}',[QuizGameController::class,'viewsoal']);
    Route::get('quizgamedelete/{id}',[QuizGameController::class,'destroy']);
    Route::get('admin-beranda', [AuthController::class,'beranda'])->name('beranda');
    


});


