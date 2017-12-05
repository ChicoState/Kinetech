<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use App\Storage\logs\laravel;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * The Cart Controller
 */
class CartController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Get the items in the cart
     * @param  Request $request 
     * @return View  Cart.cart
     */
    public function index(Request $request)
    {
        //if the session does not have a cart
        if(!Session::has('cart'))
        {
            return view('cart.cart');
        }
        //else, get the cart from the session
        $oldCart = Session::get('cart');
        //Create a new cart object to ensure it is correct.
        $cart = new Cart($oldCart);
        //load the products and total price into the view
        return view('cart.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Adds an item to the cart
     * @param Request $request
     * @param String  $sku     The unique identifier of the product to add to the cart.
     */
    public function addToCart(Request $request, $sku)
    {
        //get the item from the DB
        $product = Products::getItem($sku);
        //get the cart if it exists, otherwise NULL
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        //create a new cart
        $cart = new Cart($oldCart);
        //add the new product and the sku to the cart
        $cart->add($product, $product->sku);
        //put the cart back into the session
        Session::put('cart', $cart);
        //return the total number of items in the cart.
        return $cart->getTotalQuantity();
    }
    
    /**
     * Removes one of an item from the cart
     * @param  String $sku The unique identifier of the item to remove
     * @return View  Returns the user to the cartView
     */
    public function removeOne($sku)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if(isset($oldCart) && !empty($oldCart))
        {
            $cart = new Cart($oldCart);
            $cart->removeOne($sku);
            Session::put('cart', $cart);
        }
        return redirect()->route('cartView');
    }

    /**
     * Removes all items with the given SKU from the cart
     * @param  String $sku The unique identifier of the item to remove
     * @return [type]      [description]
     */
    public function removeAll($sku)
    {
        $oldCart = Session::has('cart') ?  Session::get('cart') : null;
        if($oldCart)
        {
            $cart = new Cart($oldCart);
            $cart->removeAll($sku);
            Session::put('cart', $cart);
        }
        return redirect()->route('cartView');
    }

    /**
     * @brief API function to clear the cart.
     * @details API function to quickly clear the cart. We might want to remove this.
     * @return Home Page.
     */
    public function resetCart()
    {
        $oldCart = Session::get('cart');
        $oldCart->resetCart();
        Session::put('cart', $oldCart);
        return view('splash');
    }
}
