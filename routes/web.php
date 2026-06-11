<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Simple static front routes for each section with route names
Route::get('/shop', function () {
    return view('shop.index');
})->name('shop');

Route::get('/contacts', function () {
    return view('contacts.index');
})->name('contact');

Route::get('/help', function () {
    return view('help.index');
})->name('help');

Route::get('/shirt-collections', function () {
    return view('shirt_collections.index');
})->name('shirt-collections');

// Fallback: try to serve {folder}/index if view exists
Route::get('/{section}', function ($section) {
    $view = $section . '.index';
    if (view()->exists($view)) {
        return view($view);
    }
    abort(404);
});
