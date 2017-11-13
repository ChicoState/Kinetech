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
    	$products      = Products::getProducts();
        $productBrands = Products::getBrands();
        return view('products.products',['products'       => $products,
                                         'productBrands'  => $productBrands,]);
    }

    public function addProductPage()
    {
        return view('products.newProduct');
    }

    public function addProduct(Request $request)
    {

    }

    public function updateProductPage()
    {
        return view('prodcuts.updateProduct');
    }

    public function updateProduct(Request $request)
    {

    }
}
