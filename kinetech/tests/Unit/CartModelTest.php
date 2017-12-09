<?php

namespace Tests\Unit;

use Session;
use App\Cart;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartModelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCartConstructor()
    {   
        $oldCart = [
        	'items' => [
        		'samsung',
        		'iphone'
        	],
        	'totalQuant' => '3',
        	'totalPrice' => '99.98'
        ];
        $cart = new Cart($oldCart);
        $this->assertEquals($cart['totalQuant'], '3');
    }
}
