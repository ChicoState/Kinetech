<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * The Products Model
 */
class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'sku';

    /**
     * Gets all products from the table
     * @return Collection All of the products from the table
     */
    public static function getProducts()
    {
    	$products = DB::table('products')->get();
    	return $products;
    }

    /**
     * Gets a specific Item from the table
     * @param  String $sku The unique identifier of the item
     * @return StdClass  The Item from the table
     */
    public static function getItem($sku)
    {
        $paddedSku = str_pad($sku, 8, '0', STR_PAD_LEFT);
        $product = DB::table('products')->where('sku', $paddedSku)->first();
        return $product;
    }

    /**
     * Gets all of the different brands of products.
     * @return Collection All different brands from the table.
     */
    public static function getBrands()
	{
        $brands = DB::table('products')->select('brand')->groupBy('brand')->get();
		return $brands;
	}
    
    /**
     * Gets all of the products in the cart.
     * @param  Cart $cart The cart from the session
     * @return Collection   All of the products from the ID's in the cart.
     */
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

    /**
     * Adds a product to the database
     * @param String $item The unique identifier to add.
     */
    public static function addProduct($item)
    {
        $sku   = str_pad($item['sku'], 8, '0', STR_PAD_LEFT);
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

    /**
     * Gets the next available sku from the table
     * @return String the last used SKU in the table.
     */
    public static function getLastSku()
    {
        return DB::table('products')->max('sku');
    }

    /**
     * Gets a specific product given the ID
     * @param  String $id The unique identifier to get
     * @return StdClass     The item that has the SKU of $id
     */
    public static function getProduct($id)
    {
        return DB::table('products')->where('sku', $id)->first();
    }

    /**
     * Update the product that has the given SKU
     * @param  Array $product The product information to update
     * @return None
     */
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
