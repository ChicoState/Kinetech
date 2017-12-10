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

    public function getCartID($orderID)
    {
        return DB::table('orders')->select('cart_id')->where('order_id', $orderID)->first();
    }

}