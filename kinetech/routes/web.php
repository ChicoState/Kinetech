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


