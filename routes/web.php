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
    return redirect('/convert');
});

Route::get('/notif', 'TestingController@notif');
Route::get('/map', 'TestingController@map');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/convert', 'ConvertController@index');
Route::post('/convert', 'ConvertController@convert');
