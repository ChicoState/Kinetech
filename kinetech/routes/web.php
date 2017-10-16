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
/*
 * Return splash view when project root requested
 *
 * @return view('splash');
 */
Route::get('/', function () {
    return view('splash');
});

/*
 * Route the request '/about' to AboutController@index 
 * in 'app/Http/Controllers/AboutController.php'
 * 
 */
Route::get('/about', 'AboutController@index');
Route::post('/login', 'Auth\LoginController@login');



Route::get('/home', 'HomeController@index')->name('home');
