<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products extends Model
{
    protected $table = 'products';

    public static function getProducts()
    {
    	$products = DB::table('products')->get();
    	return $products;
    }

    public static function getBrands()
	{
		$brands = DB::table('products')->select('brand')->groupBy('brand')->get();
		return $brands;
	}
    public static function getCartProducts($data)
    {
        $skuArray = array();
        foreach($data as $item)
        {
            array_push($skuArray, str_pad($item, 8, '00000000', STR_PAD_LEFT));
        }

        $products = DB::table('products')->select('*')->whereIn('sku', $skuArray)->get();
        return $products;
    }
}
