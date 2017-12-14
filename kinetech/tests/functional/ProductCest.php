<?php


class ProductCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function testProductRoute(FunctionalTester $I)
    {   
        $I->amOnPage('/products');
        $I->see('Price');
        $I->see('Brands');
    }
}
