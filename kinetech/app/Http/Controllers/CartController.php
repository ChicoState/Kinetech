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
        $data = $request->session()->get("cart");
        if(!empty($data))
        {
            if(array_search($sku, $data) === false)
            {
                array_push($data, $sku);
                $request->session()->put("cart", $data);
            }
        }
        else 
        {
                array_push($data, $sku);
                $request->session()->put("cart", $data);
        }
        return($data);
    }

    public function removeFromCart(Request $request)
    {
        $sku = $request->input("sku");
        $cart = $request->session()->get('cart');
        $index = array_search($sku, $cart);
        unset($cart[$index]);
        $request->session()->put("cart", $cart);
        $products = Products::getCartProducts($cart);
        return view('cart.cart', ['products' => $products]);
    }
}
