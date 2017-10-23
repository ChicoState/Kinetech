<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Products;
class CartController extends Controller
{
    public function __construct()
    {

    }
    /*
     * Return view for products index.
     *
     * @return 'products.products'
     */
    public function index(Request $request)
    {
        $data = $request->session()->get("cart");
        $products = Products::getCartProducts($data);
        return view('cart.cart', ['products' => $products]);
    }

    public function addToCart(Request $request)
    {
        $sku = $request->input("sku");
        $request->session()->push("cart", "$sku");
        $data = $request->session()->get("cart");
        return($data);
    }
}
