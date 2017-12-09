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

Route::get('/resetCart', 'CartController@resetCart');
Route::post('/addCart', 'CartController@addCart');
Route::get('/home', 'HomeController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('/login', 'Auth\LoginController@login');
Route::any('/logout', 'Auth\LoginController@logout');
Route::post('/updateProfile', 'ProfileController@updateProfile');

/**
 * Call index function in ProductsController at /products request
 */
Route::any('/products', [ 'uses' =>'ProductsController@index',
							'as' => 'productsIndex']);
Route::get('/addProduct', 'ProductsController@addProductPage');
Route::post('/addProduct', 'ProductsController@addProduct');
Route::get('/updateProduct/{id}', 'ProductsController@updateProductPage');
Route::post('/updateProduct', 'ProductsController@updateProduct');
Route::get('/addOrder', 'OrderController@addOrder');

/*
 * Return home view when project root requested
 *
 * @return view('home');
 */
Route::get('/', function () {
    return view('home');
});

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@sendEmail');

