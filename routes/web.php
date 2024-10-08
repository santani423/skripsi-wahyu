<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BungaController;
use App\Http\Controllers\DosenSkripsiController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KetentuanController;
use App\Http\Controllers\ProfileDosenController;
use App\Http\Controllers\ProfileMahasiswaController;
use App\Http\Controllers\PriodeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RuleController;

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




Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'inLogin'])->name('inLogin');
Route::get('/loginButton', [AuthController::class, 'loginButton'])->name('loginButton');
Route::get('/Logout', [AuthController::class, 'inLogout'])->name('inLogout');

Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');


Route::group(['middleware' => ['auth']], function () {

    Route::resource('/pengajuan', PengajuanController::class);
    Route::resource('/bunga', BungaController::class);
    Route::resource('/kendaraan', KendaraanController::class);
    Route::resource('/rule', RuleController::class);
    Route::resource('/ketentuans', KetentuanController::class);

    Route::resource('/dosen-skripsi', DosenSkripsiController::class);
    Route::resource('/profile-skripsi', ProfileDosenController::class);
    Route::resource('/home', HomeController::class);
    Route::resource('/mahasiswa', ProfileMahasiswaController::class);
    Route::controller(ProfileMahasiswaController::class)->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        // member
        Route::get('/daftar/skripsi', 'daftarSkripsi')->name('daftar.skripsi');

    });
    Route::resource('/periode', PriodeController::class);
});
