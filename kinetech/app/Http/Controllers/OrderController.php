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
    public function viewOrders()
    {
        $userID = Auth::user()->id;
        $orders = Order::getAllOrders($userID);


        if(isset($orders) && !empty($orders))
        {
            return view('orders.viewOrders', ['orders' => $orders]);
        }
        else return view('orders.viewOrders');
    }

    public function viewOrder($orderID)
    {
        $cartID = Order::getCartID($orderID);
        $cart = CartModel::getCart($cartID->cart_id);
        $data = json_decode($cart->data);
        $products = [];
        foreach($data as $item)
        {
           array_push($products, ['product' => Products::getProduct($item->sku),
                                    'qty'   => $item->qty]);
        }


        return view('orders.order', ['products'=> $products,
                                            'totalPrice' => $cart->price,
            ]);
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
        return redirect('/viewOrders');
    }

    public function dropOrder($orderID)
    {

    }

}
?>