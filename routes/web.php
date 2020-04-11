<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Visitors' pages
*/
Route::name('visitors.')->group(function () {
    Route::view('/', 'visitors.index')->name('index');
});

/**
 * Admin pages
 */
Route::view('/admin', 'admin.index');
