<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    /**
     * Return view for products index.
     *
     * @return 'products.products'
     */
    public function index()
    {
    	$products = Products::getProducts();
        return view('products.products',['products' => $products]);
    }
}
