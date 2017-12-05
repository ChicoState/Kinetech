<?php
use Helper\Acceptance as acceptanceHelper;
use Helper\Login as loginHelper;
use Helper\Register as registerHelper;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * @date December 4, 2017
 * Tests the register capabilities of the app.
 * Class registerTestCest
 * @package Helper
 */
class registerTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Register a new user, then make sure that they can log in.
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function registerNewUserTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I can register as a new user.');
        $I->amOnPage('/register');
        $I->waitForElementVisible(registerHelper::$nameField);
        $I->fillField(registerHelper::$nameField, registerHelper::$nameToRegister);
        $I->fillField(registerHelper::$emailField, registerHelper::$emailToRegister);
        $I->fillField(registerHelper::$passwordField, registerHelper::$passwordToRegister);
        $I->fillField(registerHelper::$confirmPassword, registerHelper::$passwordToRegister);
        $I->click(registerHelper::$registerButton);
        $I->see("Kinetech");
        $I->see('Why?');
        $I->see('What?');
        $I->see('How?');
        $I->see(acceptanceHelper::$homePageWhyText);
        $I->see(acceptanceHelper::$homePageWhatText);
        $I->see(acceptanceHelper::$homePageHowText);
        $I->see('iPhone7 Case Prototype');
        acceptanceHelper::seeFooter($I);
        loginHelper::loginAsCustomUser($I, registerHelper::$emailToRegister, registerHelper::$passwordToRegister);
        acceptanceHelper::seeLoggedInNavBarElements($I);
    }

    /**
     * Make sure that an error message will show if the name field is blank.
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function registerNoUserNameTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if I leave the name field blank.');
        $I->amOnPage('/register');
        $I->waitForElementVisible(registerHelper::$nameField);
        $I->fillField(registerHelper::$emailField, registerHelper::$emailToRegister);
        $I->fillField(registerHelper::$passwordField, registerHelper::$passwordToRegister);
        $I->fillField(registerHelper::$confirmPassword, registerHelper::$passwordToRegister);
        $I->click(registerHelper::$registerButton);
        $I->see('Please fill out this field.');
    }

    /**
     * Make sure that an error message will show if the email field is blank.
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function registerNoEmailTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if I leave the email field blank.');
        $I->amOnPage('/register');
        $I->waitForElementVisible(registerHelper::$nameField);
        $I->fillField(registerHelper::$nameField, registerHelper::$nameToRegister);
        $I->fillField(registerHelper::$passwordField, registerHelper::$passwordToRegister);
        $I->fillField(registerHelper::$confirmPassword, registerHelper::$passwordToRegister);
        $I->click(registerHelper::$registerButton);
        $I->see('Please fill out this field.');
    }

    /**
     * Make sure that an error message will show if the password field is blank.
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function registerNoPasswordTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if I leave the password field blank.');
        $I->amOnPage('/register');
        $I->waitForElementVisible(registerHelper::$nameField);
        $I->fillField(registerHelper::$nameField, registerHelper::$nameToRegister);
        $I->fillField(registerHelper::$emailField, registerHelper::$emailToRegister);
        $I->fillField(registerHelper::$confirmPassword, registerHelper::$passwordToRegister);
        $I->click(registerHelper::$registerButton);
        $I->see('Please fill out this field.');
    }

    /**
     * Make sure that an error message will show if the confirm password field is blank.
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function registerNoConfirmPasswordTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if I leave the confirm password field blank.');
        $I->amOnPage('/register');
        $I->waitForElementVisible(registerHelper::$nameField);
        $I->fillField(registerHelper::$nameField, registerHelper::$nameToRegister);
        $I->fillField(registerHelper::$emailField, registerHelper::$emailToRegister);
        $I->fillField(registerHelper::$passwordField, registerHelper::$passwordToRegister);
        $I->click(registerHelper::$registerButton);
        $I->see('Please fill out this field.');
    }

    /**
     * Make sure that the user cannot register with an email that is already in use.
     * Currently makes the server throw a 500 error.
     * @blocker https://github.com/ChicoState/Kinetech/issues/29
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function registerEmailAlreadyTakenTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if I try to register using an email that is already in use.');
        $I->amOnPage('/register');
        $I->waitForElementVisible(registerHelper::$nameField);
        $I->fillField(registerHelper::$nameField, registerHelper::$nameToRegister);
        $I->fillField(registerHelper::$emailField, registerHelper::$emailToRegister);
        $I->fillField(registerHelper::$passwordField, registerHelper::$passwordToRegister);
        $I->fillField(registerHelper::$confirmPassword, registerHelper::$passwordToRegister);
        $I->click(registerHelper::$registerButton);
       #$I->see('Please fill out this field.');
    }

    /**
     * Make sure the user cannot use the password "password".
     * @blocker https://github.com/ChicoState/Kinetech/issues/30
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function registerWeakPasswordTest(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if I use the password "password".');
        $I->amOnPage('/register');
        $I->waitForElementVisible(registerHelper::$nameField);
        $I->fillField(registerHelper::$nameField, registerHelper::$nameToRegister);
        $I->fillField(registerHelper::$emailField, registerHelper::$emailToRegister);
        $I->fillField(registerHelper::$passwordField, registerHelper::$weakPassword);
        $I->fillField(registerHelper::$confirmPassword, registerHelper::$weakPassword);
        $I->click(registerHelper::$registerButton);
        #$I->see('Please fill out this field.');
    }

    /**
     * Make sure that an error message will show if the password and confirm password fields do not match.
     * @blocker https://github.com/ChicoState/Kinetech/issues/28
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function registerPasswordsDoNotMatch(AcceptanceTester $I)
    {
        $I->wantTo('Make sure that I get an error message if the password and confirm password fields do not match');
        $I->amOnPage('/register');
        $I->waitForElementVisible(registerHelper::$nameField);
        $I->fillField(registerHelper::$nameField, registerHelper::$nameToRegister);
        $I->fillField(registerHelper::$emailField, registerHelper::$emailToRegister);
        $I->fillField(registerHelper::$passwordField, registerHelper::$passwordToRegister);
        $I->fillField(registerHelper::$confirmPassword, registerHelper::$weakPassword);
        $I->click(registerHelper::$registerButton);
        #$I->see('Please fill out this field.');
    }
}
