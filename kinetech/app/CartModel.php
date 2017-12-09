<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cart;
class CartModel extends Model
{
    public static function saveCart($oldCart, $userID)
    {
        $cart = new Cart($oldCart);
        $price = $cart->getTotalPrice();
        $quant = $cart->getTotalQuantity();
        $items = $cart->getItems();

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