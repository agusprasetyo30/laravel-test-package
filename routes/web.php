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
    Route::get('/{id}', 'AlertController@showAjax')->name('alert.showAjax');
    
    Route::post('/add', 'AlertController@store')->name('alert.add');
    Route::post('/addAjax', 'AlertController@storeAjax')->name('alert.storeAjax');

    Route::put('/{id}', 'AlertController@update')->name('alert.update');
    Route::delete('/{id}', 'AlertController@destroy')->name('alert.destroy');
});


Route::group(['prefix' => 'ajaxTest'], function () {
    Route::get('/', 'AjaxTestController@index')->name('ajax.index');
    Route::get('/{id}', 'AjaxTestController@show')->name('ajax.show');
    Route::post('/add', 'AjaxTestController@store')->name('ajax.store');
    Route::put('/{id}', 'AjaxTestController@update')->name('ajax.update');
    Route::delete('/{id}', 'AjaxTestController@destroy')->name('ajax.destroy');
});



// Auth::routes();
