<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use App\Storage\logs\laravel;


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
        if(!Session::has('cart'))
        {
            return view('cart.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function addToCart(Request $request, $sku)
    {
        $product = Products::getItem($sku);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->sku);
        Session::put('cart', $cart);
        return redirect()->route('productsIndex');
    }
}
