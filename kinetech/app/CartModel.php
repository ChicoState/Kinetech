<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Http\Controllers\Auth as Auth;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * Class CartModel
 * @package App
 */
class CartModel extends Model
{
    /**
     * Save the cart into the 'carts' table in the database.
     * @param $oldCart
     * @param $userID
     * @return mixed
     */
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

        //we need to encode the items because there is no mysql array
        DB::table('carts')->insert([
            'user_id' => $userID,
            'price'=> $price,
            'totalItems' => $quant,
            'data' => json_encode($items),
        ]);
        return DB::table('carts')->max('cart_id');
    }

    /**
     * get the cart from the database.
     * @param $cartID
     * @return mixed
     */
    public static function getCart($cartID)
    {
        return DB::table('carts')->where('cart_id', $cartID)->first();
    }
}