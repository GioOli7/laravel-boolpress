<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// Route::get('/admin', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->name('admin.')->group(function() {
    //rotta home admin routes
    Route::get('/', 'HomeController@index')->name('home');
    
    //rotte resource
    Route::resource('/posts', 'PostController');
});

// home
Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');