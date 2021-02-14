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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/merchant', 'HomeController@merchant')->name('merchant');
Route::get('/admin', 'HomeController@admin')->name('admin');

Route::post('/merchant_deactive', 'HomeController@merchant_deactive')->name('merchant_deactive');
Route::post('/merchant_active', 'HomeController@merchant_active')->name('merchant_active');