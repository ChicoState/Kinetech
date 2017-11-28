<?php


class BasicCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
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
        $I->amOnPage('/');
        $I->click('LOGIN');
        $I->wait(1);
        $I->fillField('email', 'testuser@test.com');
        $I->fillField('password', 'testpassword');
        $I->click('Log In');
        $I->wait(2);
        $I->see('CART');
        $I->see('PROFILE');
        $I->see('LOG OUT');
    }
}
