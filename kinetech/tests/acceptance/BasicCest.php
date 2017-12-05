<?php


class BasicCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }


    private function loginAsTestUser(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('LOGIN');
        $I->wait(1);
        $I->fillField('email', 'testuser@test.com');
        $I->fillField('password', 'testpassword');
        $I->click('Log In');
    }
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo("Make sure the home page loads");
        $I->amOnPage('/');
        $I->wait(1);
        $I->see("Kinetech");
    }

    public function loginTest(AcceptanceTester $I)
    {
        $I->wantTo("Attempt to log in with good data.");
        $this->loginAsTestUser($I);
        $I->wait(1);
        $I->see('CART');
        $I->see('PROFILE');
        $I->see('LOG OUT');
    }

    public function loadProfileViewTest(AcceptanceTester $I)
    {
        $I->wantTo('Log in as a regular user, and then view my profile');
        $this->loginAsTestUser($I);
        $I->wait(1);
        $I->click('PROFILE');
        $I->wait(1);
        $I->see('Hello, User');
    }

    public function loadProductsPageAsTestUserTest(AcceptanceTester $I)
    {
        $I->wantTo('Log in as a test user, and then view the products page.');
        $this->loginAsTestUser($I);
        $I->wait(1);
        $I->click('PRODUCTS');
        $I->wait(1);
        $I->see('Price');
        $I->see('Brands');
    }
}
