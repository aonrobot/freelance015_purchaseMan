<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::auth();

Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index');

	Route::group(['prefix' => 'datatables'], function()
	{
		Route::get('/', 'DatatablesController@getIndex');
		Route::get('customer', 'DatatablesController@customerData');
		Route::get('product', 'DatatablesController@productData');
		Route::get('order', 'DatatablesController@orderData');
		Route::get('orderdetail/{OrderCode}', 'DatatablesController@orderDetailData');

	});

	Route::group(['prefix' => 'customer'], function()
	{
		Route::get('/', 'CustomerController@index');
		Route::post('store', 'CustomerController@store');
		Route::get('edit/{CustomerCode}', 'CustomerController@edit');
		Route::post('update', 'CustomerController@update');
		Route::get('delete/{CustomerCode}', 'CustomerController@destroy');
	});

	Route::group(['prefix' => 'product'], function()
	{
		Route::get('/', 'ProductsController@index');
		Route::post('store', 'ProductsController@store');
		Route::get('edit/{ProductCode}', 'ProductsController@edit');
		Route::post('update', 'ProductsController@update');
		Route::get('delete/{ProductCode}', 'ProductsController@destroy');
	});

	Route::group(['prefix' => 'order'], function()
	{
		Route::get('/', 'OrderController@index');
		Route::post('store', 'OrderController@store');
		Route::get('edit/{OrderCode}', 'OrderController@edit');
		Route::post('update/{OrderCode}', 'OrderController@update');
		Route::get('delete/{OrderCode}', 'OrderController@destroy');
	});

	Route::group(['prefix' => 'orderdetail'], function()
	{
		Route::post('store', 'OrderDetailController@store');
		Route::get('delete/{OrderDetailID}', 'OrderDetailController@destroy');
	});

});

