<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/menu', function () {
    return view('pages.menu');
})->name('menu');

Route::get('/testimoni', function () {
    return view('pages.testimoni');
})->name('testimoni');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::fallback(function () {
    return response('<h1>404 - Page Not Found</h1>', 404);
});