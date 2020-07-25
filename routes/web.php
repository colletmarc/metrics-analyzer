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

Route::get('/', function (){
    return redirect()->route('apps.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('apps', 'AppController')->except('show');

    Route::get('/metrics/{app}', 'AppController@update')->name('metrics.index');
});
