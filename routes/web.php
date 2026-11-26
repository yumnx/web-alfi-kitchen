<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdminController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Frontend Utama
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/testimoni', [TestimonialController::class, 'index'])->name('testimoni');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/riwayat-pesanan', [OrderController::class, 'myOrders'])->name('orders.history')->middleware('auth');

// Route Resource untuk CRUD Database (Eloquent ORM)
Route::resource('testimonials', TestimonialController::class)->only(['store', 'update', 'destroy']);
Route::resource('categories', CategoryController::class);
Route::resource('menus', MenuController::class)->except(['index']);
Route::resource('orders', OrderController::class);
Route::resource('payments', PaymentController::class);

// Route Tambahan untuk Restore Data (Soft Delete)
Route::post('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::post('menus/{id}/restore', [MenuController::class, 'restore'])->name('menus.restore');
Route::post('orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
Route::post('payments/{id}/restore', [PaymentController::class, 'restore'])->name('payments.restore');

Route::fallback(function () {
    return response('<h1>404 - Page Not Found</h1>', 404);
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.status');
    Route::post('/menus', [AdminController::class, 'storeMenu'])->name('menus.store');
    Route::put('/menus/{id}', [AdminController::class, 'updateMenu'])->name('menus.update');
    Route::delete('/menus/{id}', [AdminController::class, 'destroyMenu'])->name('menus.destroy');
});