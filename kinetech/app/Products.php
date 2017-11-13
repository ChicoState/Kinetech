<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;
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

    public static function addProduct($item)
    {
        $sku   = str_pad($item['sku'], 8, '0', STR_PAD_LEFT);
        error_log($sku);
        $desc  = $item['desc'];
        $image = $item['image'];
        $brand = $item['brand'];
        $model = $item['model'];
        $price = $item['price'];
        $color = $item['color'];

        $productID = DB::table('products')->insert([
            'sku' => $sku,
            'description' => $desc,
            'img'   => $image,
            'brand' => $brand,
            'model' => $model,
            'price' => $price,
            'color' => $color,
            'stock' => 0,
            'created_at' =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return $productID;
    }

    public static function getLastSku()
    {
        return DB::table('products')->max('sku');
    }

    public static function getProduct($id)
    {
        return DB::table('products')->where('sku', $id)->first();
    }

    public static function updateProduct($product)
    {
        $sku = $product['sku'];
        $desc = $product['desc'];
        $brand = $product['brand'];
        $model = $product['model'];
        $color = $product['color'];
        $price = $product['price'];
        $stock = $product['stock'];
        $img   = $product['image'];

        DB::table('products')->where('sku', $sku)->update([
            'description' => $desc,
            'brand' => $brand,
            'model' => $model,
            'price' => $price,
            'stock' => $stock,
            'color' => $color,
            'img'   => $img,
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
