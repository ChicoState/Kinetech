<?php
/*
 * @author Jordan Laney <jlaney4@mail.csuchico.edu>
 *
 * Feature tests for the email contact feature.
 */

namespace Tests\Unit;

use Tests\TestCase;

class ContactTest extends TestCase
{
    public function testContactRouteSuccess()
    {
        $view = $this->call('GET', '/contact');
        $view->assertSuccessful();
    }

    public function testContactRouteStatus200()
    {
        $view = $this->call('GET', '/contact');
        $view->assertStatus(200);
    }

    public function testProperPageStrings()
    {
        $view = $this->call('GET', '/contact');
        $view->assertSee('Email');
        $view->assertSee('Name');
        $view->assertSee('Subject');
        $view->assertSee('Message');
    }

    public function testContactControllerReturnsView()
    {
        $view = $this->call('GET', '/contact');
        $view->assertViewIs('contact.contact');
    }

    public function testContactPostSent()
    {
        $post = $this->call('POST', '/contact', [
            '_token' => csrf_token(),
            'senderEmail' => 'monkey@monkey',
            'senderName' => 'monkey',
            'senderSubject' => 'App',
            'senderContent' => 'I am very interested in your app.'
        ]);
        $post->assertSee('Your email has been sent.');
    }
}