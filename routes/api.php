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
    Route::get('/products', 'Api\ProductController@index');
    Route::get('/products/{id}', 'Api\ProductController@show');
    Route::post('/cart','TransactionDetailController@addToCart');
    Route::get('/cart','TransactionDetailController@getCart');
    Route::delete('/cart/{id}','TransactionDetailController@removeCart');