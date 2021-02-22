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

Route::get('/products', 'ProductsController@index');

Route::get('/customers', 'CustomersController@index');

Route::get('/orders', 'OrdersController@index');

Route::resource('products','ProductsController');

Route::resource('customers','CustomersController');

Route::resource('orders','OrdersController');

Route::get('/excel', 'Controller@excel');

Route::post('/connection','ConnectionController@connection');

Route::get('/import', function() {
    return view('products.import');
});

Route::post('/import/importfile', 'Controller@import');

