<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Http\Controllers\Auth as Auth;

class CartModel extends Model
{
    public static function saveCart($oldCart, $userID)
    {
        $cart = new \App\Cart($oldCart);
        $price = $cart->getTotalPrice();
        $quant = $cart->getTotalQuantity();
        $items = [];
        foreach($cart->items as $item)
        {
            $itemArr = ['sku' => $item['item']->sku,
                        'qty' => $item['qty'],
                ];
            array_push($items, $itemArr );
        }

        DB::table('carts')->insert([
            'user_id' => $userID,
            'price'=> $price,
            'totalItems' => $quant,
            'data' => json_encode($items),
        ]);
        return DB::table('carts')->max('cart_id');
    }

    public static function getCart($cartID)
    {
        return DB::table('carts')->where('cart_id', $cartID)->first();
    }
}