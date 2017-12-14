<?php
/*
 * @author Jordan Laney <jlaney4@mail.csuchico.edu>
 *
 * Acceptance testing for a user tour. 
 */

use Helper\Acceptance as acceptanceHelper;
use Helper\Login as loginHelper;

class userTourCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->maximizeWindow();
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testHomePage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->wait(2);
    }

    public function testAboutPage(AcceptanceTester $I)
    {
        $I->maximizeWindow();
        $I->amOnPage('/about');
        $I->wait(2);
    }

    public function testContactPage(AcceptanceTester $I)
    {
        $I->amOnPage('/contact');
        $I->fillField('senderEmail','user@gmail.com');
        $I->fillField('senderName','Frank');
        $I->fillField('senderSubject','Samsung');
        $I->fillField('senderContent','Do you have any cases for Samsung phones?');
        $I->click('submit');
        $I->wait(5);
    }

    public function testUserCart(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        acceptanceHelper::seeNavBarElements($I);
        loginHelper::loginAsTestUser($I);
        $I->click('CART');
        $I->wait(3);
        $I->click('PRODUCTS');
        $I->wait(3);
        $I->click('Add To Cart');
        $I->wait(3);
        $I->click('CART');
        $I->wait(3);
        $I->click('LOGOUT');
    }

    public function testUserEditProfile(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        acceptanceHelper::seeNavBarElements($I);
        loginHelper::loginAsTestUser($I);
        $I->click('PROFILE');
        $I->wait(3);
        $I->click('Edit');
        $I->fillField('name', 'testUser');
        $I->click('confirmname');
        $I->wait(5);
    }
}
