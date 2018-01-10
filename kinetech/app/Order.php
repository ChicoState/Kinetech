<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;
use Auth;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * Class Order
 * @package App
 */
class Order extends Model
{
    protected $primaryKey = 'order_id';

    /**
     * Create a new order in the database.
     * @param $userID
     * @param $cartID
     */
    public static function newOrder($userID, $cartID)
    {
        DB::table('orders')->insert([
            'user_id' => $userID,
            'cart_id' => $cartID,
            'street_address' => Auth::user()->address,
            'city' => 'Chico',
            'state' => 'CA',
            'created_at' =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }

    /**
     * Get the ID of the cart of a specific order.
     * @param $orderID
     * @return mixed
     */
    public static function getCartID($orderID)
    {
        return DB::table('orders')->select('cart_id')->where('order_id', $orderID)->first();
    }

    /**
     * Get all orders that the user has placed.
     * @param $userID
     * @return Collection of orders or null
     */
    public static function getAllOrders($userID)
    {
        $orders = DB::table('orders')
            ->join('carts', 'orders.cart_id', '=', 'carts.cart_id')
            ->select('carts.price', 'carts.totalItems', 'orders.created_at', 'orders.order_id')
            ->where('orders.user_id', $userID)->get();
        if(isset($orders) && !empty($orders))
        {
            return $orders;
        }
        else return null;
    }

}