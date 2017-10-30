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
Route::get('/home', 'HomeController@index');
Route::get('/cart', 'CartController@index');
Route::post('/addToCart', 'CartController@addToCart');
Route::post('/remove', 'CartController@removeFromCart');
Route::post('/login', 'Auth\LoginController@login');
Route::any('/logout', 'Auth\LoginController@logout');

/**
 * Call index function in ProductsController at /products request
 */
Route::any('/products', 'ProductsController@index');

/*
 * Return home view when project root requested
 *
 * @return view('home');
 */
Route::get('/', function () {
    return view('home');
});

Route::get('test_mail', function(){
    Mail::raw('Sending test email from Laravel', function($message){
        $message->to('foomasri@gmail.com');
    });
});

