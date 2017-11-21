<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Products;
use App\User;
use Auth;


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
        $isAdmin       = Auth::user()->is_admin;
        return view('products.products',['products'       => $products,
                                         'productBrands'  => $productBrands,
                                         'isAdmin'        => $isAdmin,]);
    }

    public function addProductPage()
    {
        $lastSku = str_pad(Products::getLastSku() + 1, 8, '0', STR_PAD_LEFT);
        return view('products.newProduct', ['lastSku' => $lastSku]);
    }

    public function addProduct(Request $request)
    {
        $sku   = $request->input('sku');
        $desc  = $request->input('description');
        $image = $request->file('file');
        $brand = $request->input('brand');
        $model = $request->input('model');
        $price = $request->input('price');
        $color = $request->input('color');

        $imagePath = $image->store('/imgs', 'public');
        error_log($imagePath);
        $productID = Products::addProduct([
            'sku' => $sku,
            'desc' => $desc,
            'image' => '/' . $imagePath,
            'brand' => $brand,
            'model' => $model,
            'price' => $price,
            'color' => $color,
        ]);
        return redirect()->route('adminDash');
    }

    public function updateProductPage($id)
    {
        $product = Products::getProduct($id);
        return view('products.updateProduct', ['product' => $product]);
    }

    public function updateProduct(Request $request)
    {
        $sku = $request->input('sku');
        $desc = $request->input('description');
        $brand = $request->input('brand');
        $model = $request->input('model');
        $color = $request->input('color');
        $price = $request->input('price');
        $stock = $request->input('stock');
        $image = $request->input('image');

        Products::updateProduct([
            'sku' => $sku,
            'desc' => $desc,           
            'brand' => $brand,
            'model' => $model,
            'color' => $color,
            'price' => $price,
            'stock' => $stock,
            'image' => $image,
        ]);

        return redirect('/products');
    }
}
