<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    public function testHomeRouteSuccess()
    {
        $view = $this->call('GET', '/');
        $view->assertSuccessful();
    }

    public function testProperPageStrings()
    {
        $view = $this->call('GET', '/');
        $view->assertSee('Why?');
        $view->assertSee('What?');
        $view->assertSee('How?');
    }
}
