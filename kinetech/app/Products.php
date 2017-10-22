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
}
