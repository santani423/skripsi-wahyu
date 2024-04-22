<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenSkripsiController;

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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'inLogin'])->name('inLogin');
Route::get('/loginButton', [AuthController::class, 'loginButton'])->name('loginButton');
Route::get('/Logout', [AuthController::class, 'inLogout'])->name('inLogout');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('/dosen-skripsi', DosenSkripsiController::class);
    Route::resource('/home', HomeController::class);
});
