<?php
/*
 * @author Jordan Laney <jlaney4@mail.csuchico.edu>
 *
 * Feature tests for the products feature.
 */

namespace Tests\Feature;

use Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProductsRoute()
    {
        $view = $this->call('GET', '/products');
        $view->assertSuccessful();
    }

    public function testLoginForAdminFunctions()
    {
        Session::start();
        $this->call('POST', '/login', [
            'user' => 'admin@gmail.com',
            'password' => 'admin',
            '_token' => csrf_token()
        ]);
        $view = $this->call('GET', '/products');
        $view->assertSuccessful();
    }
}
