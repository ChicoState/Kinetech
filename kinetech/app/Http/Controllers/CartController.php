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
        return Products::getProducts();
    }

    public function addCart(Request $request)
    {
    }
    public function addToCart(Request $request, $sku)
    {

        $product = Products::find($sku);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        Session::put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('/products');

    }

}
