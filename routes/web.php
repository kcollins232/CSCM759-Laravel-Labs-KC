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

use App\Http\Controllers\AxolotlSearchController;

Route::get('/axolotls/search', [AxolotlSearchController::class, 'index'])->name('axolotls.search');

Route::get('/axolotls/autocomplete', [AxolotlSearchController::class, 'autocomplete'])->name('axolotls.autocomplete');

use App\Http\Controllers\AxolotlController;

Route::get('/axolotls', [AxolotlController::class, 'index'])->name('axolotls.index');

Route::get('/axolotls/{axolotl}', [AxolotlController::class, 'show'])->name('axolotls.show');


use App\Http\Controllers\StoryController;

Route::get('/axolotls/{axolotl}/stories/create', [StoryController::class, 'create'])->name('stories.create');

Route::post('/axolotls/{axolotl}/stories', [StoryController::class, 'store'])->name('stories.store');

