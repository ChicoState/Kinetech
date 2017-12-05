<?php

use Helper\Acceptance as acceptanceHelper;

class BasicCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }



    // tests

    public function loginTest(AcceptanceTester $I)
    {
        $I->wantTo("Attempt to log in with good data.");
        acceptanceHelper::loginAsTestUser($I);
        $I->wait(1);
        $I->see('CART');
        $I->see('PROFILE');
        $I->see('LOG OUT');
    }

    public function loadProfileViewTest(AcceptanceTester $I)
    {
        $I->wantTo('Log in as a regular user, and then view my profile');
        acceptanceHelper::loginAsTestUser($I);
        $I->wait(1);
        $I->click('PROFILE');
        $I->wait(1);
        $I->see('Hello, User');
    }

    public function loadProductsPageAsTestUserTest(AcceptanceTester $I)
    {
        $I->wantTo('Log in as a test user, and then view the products page.');
        acceptanceHelper::loginAsTestUser($I);
        $I->wait(1);
        $I->click('PRODUCTS');
        $I->wait(1);
        $I->see('Price');
        $I->see('Brands');
    }
}
