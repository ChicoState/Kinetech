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


Route::get('/register', function() {
	return view('auth/register', ['as'=> 'register', 'name' => 'Username']);
});
Route::post('/register', 'Auth\RegisterController@create');

/**
 * Call index function in AboutController at /about request
 *
 */
Route::get('/about', 'AboutController@index');
Route::get('/cart', 		  ['uses' => 'CartController@index',
								 'as' => 'cartView',]);
Route::any('/addToCart/{id}', ['uses' => 'CartController@addToCart',
								 'as' => 'addToCart',]);

Route::get('/removeOne/{id}', ['uses' => 'CartController@removeOne',
								 'as' => 'removeOne',]);

Route::get('/removeAll/{id}', ['uses' => 'CartController@removeAll',
								 'as' => 'removeAll',]);

Route::post('/addCart', 'CartController@addCart');
Route::post('/login', 'Auth\LoginController@login');
Route::any('/logout', 'Auth\LoginController@logout');

/**
 * Call index function in ProductsController at /products request
 */
Route::any('/products', [ 'uses' =>'ProductsController@index',
							'as' => 'productsIndex']);

/*
 * Return splash view when project root requested
 *
 * @return view('splash');
 */
Route::get('/', function () {
    return view('splash');
});
