<?php
namespace App\Http\Controllers;

use App\Products;
use App\Order;
use Auth;
use Session;
use App\Cart;
use Illuminate\Http\Request;
use App\CartModel;

class OrderController extends Controller
{
    public function viewOrder($orderID)
    {
        $cartID = Order::getCartID($orderID);
        $cart = CartModel::getCart($cartID);
        error_log(print_r($cart));
        //return view('orders.order', ['cart'=> $cart]);
    }

    public function addOrder()
    {
        $id = Auth::user()->id;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        if(isset($oldCart) && !empty($oldCart))
        {
            error_log("old cart is good.");
        }
        //Create a new cart object to ensure it is correct.
        $cart = new Cart($oldCart);
        $cartID = CartModel::saveCart($cart, $id);
        Order::newOrder($id, $cartID);
        Session::forget('cart');
        return view('home');
    }

    public function dropOrder($orderID)
    {

    }

}
?>