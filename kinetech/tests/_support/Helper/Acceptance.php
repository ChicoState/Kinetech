<?php
namespace Helper;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * @date December 4, 2017
 * Helper functions and variables for use with the home page.
 * Class Acceptance
 * @package Helper
 */
class Acceptance extends \Codeception\Module
{
    // ~~~~~~~~~HOME PAGE VARIABLES ~~~~~~~~~~~//
    public static $homePageWhyText = 'To keep your mobile device charged and you connected on-the-go without the hassle of carrying around wires and staying tethered to a portable charger. Allow yourself to truly live free from any limitations!';
    public static $homePageWhatText = 'Voltanium battery cases by KineTech Electronics allows you to snap on and off portable power packs to keep you charged and connected on-the-go. Never worry about carrying wires and being tethered to a portable charger on-the-go again!';
    public static $homePageHowText = 'Our power packs are universally rechargeable with any micro-usb OR lightning cables as well as a Qi-wireless charging, giving you the benefit of always having at least one charged power pack to take with you where ever you go!';


    public static function seeNavBarElements(\AcceptanceTester $I)
    {
        $I->see('Kinetech');
        $I->see('HOME');
        $I->see('ABOUT');
        $I->see('PRODUCTS');
        $I->see('LOGIN');
        $I->see('REGISTER');
        $I->dontSee('Email');
        $I->dontSee('Password');
        $I->dontSee('Log In');
        $I->dontSee('#loginClose');
    }

    public static function seeLoggedInNavBarElements(\AcceptanceTester $I)
    {
        $I->see('Kinetech');
        $I->see('HOME');
        $I->see('ABOUT');
        $I->see('PRODUCTS');
        $I->dontSee('LOGIN');
        $I->dontSee('REGISTER');
        $I->dontSee('Email');
        $I->dontSee('Password');
        $I->dontSee('Log In');
        $I->dontSee('#loginClose');
        $I->see('CART');
        $I->see('PROFILE');
        $I->see('LOG OUT');
    }

    /**
     * Check to see if we can see all footer elements.
     * @param \AcceptanceTester $I
     */
    public static function seeFooter(\AcceptanceTester $I)
    {
        $I->see('Contact Us');
        $I->see('Returns');
        $I->see('Merch');
        $I->see('Other');
    }



}
