<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// Public routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected routes (require login)
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Category Routes
    Route::resource('categories', CategoryController::class);

    // Product Routes
    Route::resource('products', ProductController::class);

    // Order Routes
    Route::resource('orders', OrderController::class);
});
