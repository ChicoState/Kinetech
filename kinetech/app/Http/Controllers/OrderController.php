<?php
namespace App\Http\Controllers

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
        $oldCart = Session::get('cart');
        //Create a new cart object to ensure it is correct.
        $cart = new Cart($oldCart);
        $cartID = CartModel::saveCart($id, $cart);
        Order::newOrder($id, $cartID);

    }

    public function dropOrder($orderID)
    {

    }

}
?>