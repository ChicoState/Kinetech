<?php
use Helper\Acceptance as acceptanceHelper;

class homeTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Test to make sure that the home page loads.
     * Look for all text on the home page, but don't worry about the nav bar.
     * We will test that later.
     * @param AcceptanceTester $I
     */
    public function loadHomePageTest(AcceptanceTester $I)
    {
        $I->wantTo("Make sure the home page loads");
        $I->amOnPage('/');
        $I->wait(1);
        $I->see("Kinetech");
        $I->see('Why?');
        $I->see('What?');
        $I->see('How?');
        $I->see(acceptanceHelper::$homePageWhyText);
        $I->see(acceptanceHelper::$homePageWhatText);
        $I->see(acceptanceHelper::$homePageHowText);
        $I->see('iPhone7 Case Prototype');
        acceptanceHelper::seeFooter($I);
    }

    /**
     * Test to make sure that the navbar loads the "login" and "register"
     * buttons but not the Email and Password fields with the Log In button.
     * @param AcceptanceTester $I
     */
    public function loadNavBarLoggedOutTest(AcceptanceTester $I)
    {
        $I->wantTo("Make sure the nav bar shows the 'login' and 'register' options when the user is not logged in.");
        $I->amOnPage('/');
        acceptanceHelper::seeNavBarElements($I);
        $I->see('Why?');
        $I->see('What?');
        $I->see('How?');
        $I->see(acceptanceHelper::$homePageWhyText);
        $I->see(acceptanceHelper::$homePageWhatText);
        $I->see(acceptanceHelper::$homePageHowText);
        $I->see('iPhone7 Case Prototype');
        acceptanceHelper::seeFooter($I);
    }

    /**
     * Test to make sure that the email and password fields appear when we click the "LOGIN" button.
     * The rest of the page should be the same.
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function loadNavBarClickLoginButtonTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that the navbar will show the email and password fields when I click the login button');
        $I->amOnPage('/');
        acceptanceHelper::seeNavBarElements($I);
        $I->see('Why?');
        $I->see('What?');
        $I->see('How?');
        $I->see(acceptanceHelper::$homePageWhyText);
        $I->see(acceptanceHelper::$homePageWhatText);
        $I->see(acceptanceHelper::$homePageHowText);
        $I->see('iPhone7 Case Prototype');
        acceptanceHelper::seeFooter($I);
        $I->click('LOGIN');
        $I->waitForElementVisible("input[name='email']");
        $I->waitForElementVisible("input[name='password']");
        $I->see('Log In');
        $I->dontSee('LOGIN');
        $I->dontSee('REGISTER');
    }

    /**
     * Test to make sure that the email and password fields appear when we click the "LOGIN" button,
     * and then make sure that "LOGIN" and "REGISTER" appear again once we hit the "X" button.
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function loadNavBarClickLoginButtonCancelTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that the navbar will show the email and password fields when I click the login button, then will show the login and register buttons again when I click the X');
        $I->amOnPage('/');
        acceptanceHelper::seeNavBarElements($I);
        $I->see('Why?');
        $I->see('What?');
        $I->see('How?');
        $I->see(acceptanceHelper::$homePageWhyText);
        $I->see(acceptanceHelper::$homePageWhatText);
        $I->see(acceptanceHelper::$homePageHowText);
        $I->see('iPhone7 Case Prototype');
        acceptanceHelper::seeFooter($I);
        $I->click('LOGIN');
        $I->waitForElementVisible("input[name='email']");
        $I->waitForElementVisible("input[name='password']");
        $I->see('Log In');
        $I->dontSee('LOGIN');
        $I->dontSee('REGISTER');
        $I->click('#loginClose');
        $I->waitForElementVisible('#loginButton');
        $I->see('LOGIN');
        $I->see('REGISTER');
    }
}
