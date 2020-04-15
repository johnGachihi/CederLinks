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
    Route::view('/t&c', 'visitors.terms-and-conditions')->name('terms-and-conditions');
});

/**
 * Admin pages
 */
Route::view('/admin', 'admin.index');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('me', function () {
            return response()->json([
                'user' => Auth::user()
            ]);
        });
    });
});
