<?php
namespace App\Http\Controllers;

use App\Products;
use App\Order;
use Auth;
use Session;
use App\Cart;
use Illuminate\Http\Request;
use App\CartModel;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * This is the controller for the index class
 */
class OrderController extends Controller
{
    /**
     * View all of the users orders that have been placed.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * View the contents of a specific order.
     * @param $orderID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewOrder($orderID)
    {
        $cartID = Order::getCartID($orderID);
        $cart = CartModel::getCart($cartID->cart_id);
        //decode the 'data' field from the cart that was encoded during storage.
        $data = json_decode($cart->data);
        //declare an empty array.
        $products = [];
        foreach($data as $item)
        {
            //push the array of the product and the quantity to the products array.
            //this makes $products an array of arrays such that
            //$products[0] = ['product' => product, 'qty' => quantity]
           array_push($products, ['product' => Products::getProduct($item->sku),
                                    'qty'   => $item->qty]);
        }

        //load the view specific order view with the products and the total order price.
        return view('orders.order', ['products'=> $products,
                                            'totalPrice' => $cart->price,
            ]);
    }

    /**
     * Add an order to the database.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addOrder()
    {
        $id = Auth::user()->id;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        //@TODO: remove this
        if(isset($oldCart) && !empty($oldCart))
        {
            error_log("old cart is good.");
        }
        //Create a new cart object to ensure it is correct.
        $cart = new Cart($oldCart);
        $cartID = CartModel::saveCart($cart, $id);
        Order::newOrder($id, $cartID);
        //delete the cart from the session once the user places an order.
        Session::forget('cart');
        return redirect('/viewOrders');
    }

    /**
     * Drop an order from the database.
     * Should be admin only.
     * @TODO: Write this.
     * @param $orderID
     */
    public function dropOrder($orderID)
    {

    }

}
?>