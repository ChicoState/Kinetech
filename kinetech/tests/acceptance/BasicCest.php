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
        $I->wait(2);
        $I->see("Kinetech");
    }
}
