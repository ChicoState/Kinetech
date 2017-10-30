<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'sku';

    public static function getProducts()
    {
    	$products = DB::table('products')->get();
    	return $products;
    }
    public static function getItem($sku)
    {
        $paddedSku = str_pad($sku, 8, '0', STR_PAD_LEFT);
        $product = DB::table('products')->where('sku', $paddedSku)->first();
        return $product;
    }
    public static function getBrands()
	{
        $brands = DB::table('products')->select('brand')->groupBy('brand')->get();
		return $brands;
	}
    public static function getCartProducts($cart)
    {
        $skuArray = [];
        if(isset($cart) && !empty($cart))
        {
            foreach($cart->items as $item)
            {
                array_push($skuArray, str_pad($item, 8, '0', STR_PAD_LEFT));
            }
        }

        $products = DB::table('products')->select('*')->whereIn('sku', $skuArray)->get();
    }
}
