<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Return view for products index.
     *
     * @return 'products.products'
     */
    public function index()
    {
        return view('products.products');
    }
}
