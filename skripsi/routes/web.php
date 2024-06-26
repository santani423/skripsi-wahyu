<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Auth
Route::get('/login', [AuthController::class, 'loginUser']);
Route::post('/login', [AuthController::class, 'doLoginUser']);
Route::get('/register', [AuthController::class, 'RegisterUser']);
Route::post('/register', [AuthController::class, 'doRegisterUser']);
Route::post('/logout', [AuthController::class, 'logoutUser']);
Route::get('/', [ServiceController::class, 'index'])->name('homepage');

// Order
Route::get('/{slug}/detail', [ServiceController::class, 'detailService']);

Route::middleware('user.auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user-dashboard');
    Route::post('/{service}/order', [OrderController::class, 'orderUser']);
    Route::get('/payment/{order}/detail', [PaymentController::class, 'paymentDetail']);
    Route::get('/{order}/payment', [PaymentController::class, 'paymentUser'])->name('payment-user');
    Route::post('/{order}/payment', [PaymentController::class, 'addPayment']);
    Route::get('/dashboard/{order}/timeline', [TimelineController::class, 'indexUser']);
});


Route::prefix('admin')->group(function () {
    // Auth
    Route::get('login', [AuthController::class, 'loginAdmin']);
    Route::post('login', [AuthController::class, 'doLoginAdmin']);


    Route::middleware('admin.only')->group(function () {
        Route::get('', [DashboardController::class, 'indexAdmin']);
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'indexAdmin'])->name('admin-dashboard');
        // Services
        Route::prefix('services')->group(function () {
            Route::get('', [ServiceController::class, 'indexAdmin'])->name('admin-service');
            Route::get('create', [ServiceController::class, 'create']);
            Route::post('create', [ServiceController::class, 'store']);
            Route::get('{slug}', [ServiceController::class, 'edit']);
            Route::post('{service}', [ServiceController::class, 'update']);
            Route::delete('{service}', [ServiceController::class, 'destroy']);
        });
        // Timeline
        Route::prefix('timelines')->group(function () {
            Route::get('', [TimelineController::class, 'indexAdmin'])->name('index-timeline');
            Route::get('create', [TimelineController::class, 'create']);
            Route::post('create', [TimelineController::class, 'store']);
            Route::get('{timeline}', [TimelineController::class, 'edit']);
            Route::put('{timeline}', [TimelineController::class, 'update']);
            Route::delete('{timeline}', [TimelineController::class, 'destroy']);
        });
        // Orders
        Route::prefix('orders')->group(function () {
            Route::get('', [OrderController::class, 'indexAdmin']);
            Route::get('/create', [OrderController::class, 'create']);
            Route::post('/create', [OrderController::class, 'orderByAdmin']);
            Route::get('/{order}/edit', [OrderController::class, 'edit']);
            Route::put('{order}/update', [OrderController::class, 'update']);
            Route::get('{order}/update-timeline', [OrderController::class, 'editTimeline']);
            Route::put('/{order}/update-timeline', [OrderController::class, 'updateTimeline']);
            Route::delete('{order}/delete', [OrderController::class, 'destroy']);
            Route::get('/{order}/payment', [PaymentController::class, 'paymentDetailAdmin']);
            Route::put('/{order}/payment/{type}', [PaymentController::class, 'updatePaymentStatus']);
        });

        Route::post('/logout', [AuthController::class, 'doLogoutAdmin']);
    });
});
