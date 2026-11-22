<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

// Halaman Frontend Utama
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/testimoni', function () {
    return view('pages.testimoni');
})->name('testimoni');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Route Resource untuk CRUD Database (Eloquent ORM)
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