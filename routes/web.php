<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'testalert'], function () {
    Route::get('/', 'AlertController@index')->name('alert.index');
    Route::post('/add', 'AlertController@store')->name('alert.add');
    
    Route::get('/{id}/delete', 'AlertController@destroy')->name('alert.destroy');
});



// Auth::routes();
