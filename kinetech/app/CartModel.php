<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartModel extends Model
{
    public static function saveCart($cart, $userID)
    {
        $price = $cart['totalPrice'];
        $quant = $cart['totalQuant'];
        $items = $cart['items'];

        DB::table('carts')->insert([
            'user_id' => $userID,
            'price'=> $price,
            'totalItems' => $quant,
            'data' => $items,
        ]);
        return DB::table('carts')->max('cart_id');
    }

    public static function getCart($cartID)
    {
        return DB::table('carts')->where('cart_id', $cartID)->first();
    }
}