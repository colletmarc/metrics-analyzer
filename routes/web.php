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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'AppController@index')->name('apps.index');
    Route::get('/create', 'AppController@create')->name('apps.create');
    Route::post('/store', 'AppController@store')->name('apps.store');
    Route::get('/{app}/edit', 'AppController@edit')->name('apps.edit');
    Route::patch('/{app}/update', 'AppController@update')->name('apps.update');
    Route::delete('/{app}/delete', 'AppController@delete')->name('apps.delete');

    Route::get('/metrics/{app}', 'AppController@update')->name('metrics.index');
});
