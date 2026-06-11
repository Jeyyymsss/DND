<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Static front routes
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

// Generic fallback to serve folder index views if they exist
Route::get('/{section}', function ($section) {
    $view = $section . '.index';
    if (view()->exists($view)) {
        return view($view);
    }
    abort(404);
});
