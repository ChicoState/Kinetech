<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;
use Auth;


class Order extends Model
{
    protected $primaryKey = 'order_id';

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

    public static function getCartID($orderID)
    {
        return DB::table('orders')->select('cart_id')->where('order_id', $orderID)->first();
    }

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