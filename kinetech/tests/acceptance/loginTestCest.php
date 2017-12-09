<?php
use Helper\Acceptance as acceptanceHelper;
use Helper\Login as loginHelper;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * @date December 4, 2017
 * Tests the login/logout capabilities of the app.
 * Class loginTestCest
 * @package Helper
 */
class loginTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Log in as a normal user.
     * Uses the loginHelper::loginAsTestUser helper function
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function LogInAsNormalUserTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I can log in as a normal user.');
        $I->amOnPage('/');
        acceptanceHelper::seeNavBarElements($I);
        loginHelper::loginAsTestUser($I);
    }

    /**
     * Make sure we get the appropriate error message when the Username
     * is not found.
     * @blocker: https://github.com/ChicoState/Kinetech/issues/26
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function LogInWithBadUserNameTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if my username is not found.');
        $I->amOnPage('/');
        $I->waitForElementVisible("#loginButton");
        $I->click('LOGIN');
        $I->waitForElementVisible('#loginClose');
        $I->fillField('email', 'usernameNotFound');
        $I->fillField('password', 'nottherightpassword');
        $I->click('Log In');
        $I->wait(2);

        /* UNCOMMENT THIS ONCE THE BUG IS FIXED.
         * https://github.com/ChicoState/Kinetech/issues/26
         *

        $I->see('Username or password not found.');

        /**/
    }

    /**
     * Make sure we get the appropriate error message when the password
     * is incorrect.
     * @blocker: https://github.com/ChicoState/Kinetech/issues/26
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function LogInWithBadPasswordTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if my password is wrong.');
        $I->amOnPage('/');
        $I->waitForElementVisible("#loginButton");
        $I->click('LOGIN');
        $I->waitForElementVisible('#loginClose');
        $I->fillField('email', 'testuser@test.com');
        $I->fillField('password', 'nottherightpassword');
        $I->click('Log In');
        $I->wait(2);

        /* UNCOMMENT THIS ONCE THE BUG IS FIXED.
         * https://github.com/ChicoState/Kinetech/issues/26
         *

        $I->see('Username or password not found.');

        /**/
    }

    /**
     * Make sure we get the appropriate error message when the Username
     * field is blank.
     * @blocker: https://github.com/ChicoState/Kinetech/issues/26
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function LogInWithBlankUserNameTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if my username is blank.');
        $I->amOnPage('/');
        $I->waitForElementVisible("#loginButton");
        $I->click('LOGIN');
        $I->waitForElementVisible('#loginClose');
        $I->fillField('email', '');
        $I->fillField('password', 'nottherightpassword');
        $I->click('Log In');
        $I->wait(2);

        /* UNCOMMENT THIS ONCE THE BUG IS FIXED.
         * https://github.com/ChicoState/Kinetech/issues/26
         *

        $I->see('Username or password not found.');

        /**/
    }

    /**
     * Make sure we get the appropriate error message when the password
     * field is blank.
     * @blocker: https://github.com/ChicoState/Kinetech/issues/26
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function LogInWithBlankPasswordTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if my password is blank.');
        $I->amOnPage('/');
        $I->waitForElementVisible("#loginButton");
        $I->click('LOGIN');
        $I->waitForElementVisible('#loginClose');
        $I->fillField('email', 'testuser@test.com');
        $I->fillField('password', '');
        $I->click('Log In');
        $I->wait(2);

        /* UNCOMMENT THIS ONCE THE BUG IS FIXED.
         * https://github.com/ChicoState/Kinetech/issues/26
         *

        $I->see('Username or password not found.');

        /**/
    }

    public function logoutTest(AcceptanceTester $I)
    {
        loginHelper::loginAsTestUser($I);
        $I->click('LOG OUT');
        acceptanceHelper::seeNavBarElements($I);
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
}
