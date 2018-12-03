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
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function(){
    Route::resource('users','UserController');
    Route::post('/importProducts','ProductController@importProducts')->name('products.import');
    Route::resource('products', 'ProductController');
    Route::resource('customers','CustomerController');
    Route::resource('transactions','TransactionController');
    Route::get('/transactions/create/customer','TransactionController@addCustomer')->name('addCustomer');
    Route::post('/transactions/create/customer','TransactionController@saveCustomer')->name('saveCustomer');
});
