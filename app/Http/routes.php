<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/greet/{name?}', function ($name = null) {
    return view('actions.greet',['name' => $name ] );
})->name('greet');

Route::get('/hug', function () {
    return view('actions.hug');
})->name('hug');

Route::get('/kiss', function () {
    return view('actions.kiss');
})->name('kiss');
