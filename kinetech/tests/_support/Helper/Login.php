<?php
namespace Helper;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * @date December 4, 2017
 * Helper functions and variables for use with Login functionality.
 * Class Login
 * @package Helper
 */
class Login extends \Codeception\Module
{
    /**
     * Login as a Test User.
     * @param \AcceptanceTester $I
     */
    public static function loginAsTestUser(\AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('LOGIN');
        $I->wait(1);
        $I->fillField('email', 'testuser@test.com');
        $I->fillField('password', 'testpassword');
        $I->click('Log In');
    }

    public static function loginAsCustomUser(\AcceptanceTester $I, $username, $password)
    {
        $I->amOnPage('/');
        $I->click('LOGIN');
        $I->wait(1);
        $I->fillField('email', $username);
        $I->fillField('password', $password);
        $I->click('Log In');
    }
}
