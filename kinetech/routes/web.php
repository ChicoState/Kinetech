<?php

/**
 * Return splash view when project root requested
 *
 * @return view('splash');
 */
Route::get('/', function () {
    return view('splash');
});

/**
 * Call index function in AboutController at /about request
 *
 */
Route::get('/about', 'AboutController@index');

/**
 * Call index function in ProductsController at /products request
 */
Route::get('/products', 'ProductsController@index');
