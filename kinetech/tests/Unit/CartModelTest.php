<?php

namespace Tests\Unit;

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
        $oldcart = [
        	'items' => [
        		'samsung',
        		'iphone'
        	],
        	'totalQuant' => 3,
        	'totalPrice' => 99.98
        ];
        $cart = new Cart($oldcart);
        $this->assertEquals($cart->totalQuant, 3);
    }
}
