<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'merchant'], function(){
    Route::post('register', 'MerchantsController@register')->name('merchant.register');
    Route::post('addProduct', 'MerchantsController@addProduct')->name('merchant.addProduct');
    Route::post('detailsProduct', 'MerchantsController@detailsProduct')->name('merchant.detailsProduct');
    Route::post('editProduct', 'MerchantsController@editProduct')->name('merchant.editProduct');
    Route::post('startSales', 'MerchantsController@startSales')->name('merchant.startSales');
    Route::post('addTrx', 'MerchantsController@addTrx')->name('merchant.addTrx');
});
