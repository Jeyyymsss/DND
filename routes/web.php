<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Simple static front routes for each section
Route::get('/shop', function () {
    return view('shop.index');
});

Route::get('/contacts', function () {
    return view('contacts.index');
});

Route::get('/help', function () {
    return view('help.index');
});

Route::get('/shirt-collections', function () {
    return view('shirt_collections.index');
});

// Fallback: try to serve {folder}/index if view exists
Route::get('/{section}', function ($section) {
    $view = $section . '.index';
    if (view()->exists($view)) {
        return view($view);
    }
    abort(404);
});
