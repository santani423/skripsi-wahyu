<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenSkripsiController;
use App\Http\Controllers\ProfileDosenController;
use App\Http\Controllers\Api\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// `Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });`

Route::resource('/dosen-skripsi', DosenSkripsiController::class);
Route::resource('/dosen', ProfileDosenController::class);

Route::get('/login', [ApiAuthController::class, 'login'])->name('login');
Route::post('/login', [ApiAuthController::class, 'inLogin'])->name('inLogin');