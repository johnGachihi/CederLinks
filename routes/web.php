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


Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::view('/', 'admin.index')->name('admin.index');
        Route::view('/make-mission/{id}', 'admin.index');
        Route::get('me', function () {
            return response()->json([
                'user' => Auth::user()
            ]);
        });
        Route::post('/mission', 'MissionController@create');
        Route::get('/mission/{id?}', 'MissionController@read');
        Route::post('/mission/{id}', 'MissionController@update');
        Route::delete('/mission/{id}', 'MissionController@delete');
    });
});
