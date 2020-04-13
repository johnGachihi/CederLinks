<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Visitors' pages
*/
Route::name('visitors.')->group(function () {
    Route::view('/', 'visitors.index')->name('index');
    Route::view('/about', 'visitors.about')->name('about');
    Route::view('/services', 'visitors.services')->name('services');
});

/**
 * Admin pages
 */
Route::view('/admin', 'admin.index');
