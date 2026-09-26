<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.placeholder', ['title' => 'Home']);
})->name('home');

Route::get('/about', function () {
    return view('pages.placeholder', ['title' => 'About']);
})->name('about');

Route::get('/program', function () {
    return view('pages.placeholder', ['title' => 'Program']);
})->name('program');

Route::get('/our-team', function () {
    return view('pages.placeholder', ['title' => 'Our Team']);
})->name('our-team');

Route::get('/contact-us', function () {
    return view('pages.placeholder', ['title' => 'Contact Us']);
})->name('contact-us');

Route::fallback(function () {
    return response('<h1>404 - Page Not Found</h1>', 404);
});