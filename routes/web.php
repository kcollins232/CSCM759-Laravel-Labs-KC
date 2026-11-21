<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Welcome to Axolotl Adventures!';
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/greet/{name}', function ($name) {
    return view('greet', ['name' => $name]);
});
