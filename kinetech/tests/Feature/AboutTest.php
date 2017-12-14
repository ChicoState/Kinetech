<?php
/*
 * @author Jordan Laney <jlaney4@mail.csuchico.edu>
 *
 * Feature tests for the about page.
 */

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AboutTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAboutRoute()
    {
        $view = $this->call('GET', '/about');
        $view->assertSuccessful();
    }
}
