<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Products;
use App\User;
use Auth;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * Products Controller
 */
class ProductsController extends Controller
{
    /**
     * Get all products and product brands from the model,
     * Check if user is admin, and then pass it to the view.
     * @return Products/products  The view that loads all products.
     */
    public function index()
    {
    	$products      = Products::getProducts();
        $productBrands = Products::getBrands();
        //If there is no user then $isAdmin becomes "non-object"
        //We need to be able to load the page if you are not logged in
        if(Auth::user()) {
            $isAdmin = Auth::user()->is_admin;
        } else {
            $isAdmin = false;
        }
        return view('products.products',['products'       => $products,
                                         'productBrands'  => $productBrands,
                                         'isAdmin'        => $isAdmin,]);
    }

    /**
     * Loads the page for adding a new product to the DB 
     * for an admin. Needs to take the next available SKU
     */
    public function addProductPage()
    {
        $lastSku = str_pad(Products::getLastSku() + 1, 8, '0', STR_PAD_LEFT);
        return view('products.newProduct', ['lastSku' => $lastSku]);
    }

    /**
     * Adds a new product to the database
     * @param HttpRequest $request
     */
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

    /**
     * Loads the update product page given a SKU
     * @param  String $id The SKU of the item to update
     * @return View     Products.updateProduct
     */
    public function updateProductPage($id)
    {
        $product = Products::getProduct($id);
        return view('products.updateProduct', ['product' => $product]);
    }

    /**
     * Update a product
     * @param  Request $request 
     * @return Redirect to the Products page
     */
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
