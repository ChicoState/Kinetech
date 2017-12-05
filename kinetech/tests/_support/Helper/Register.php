<?php
namespace Helper;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * @date December 4, 2017
 * Helper functions and variables for use with Register functionality.
 * Class Register
 * @package Helper
 */
class Register extends \Codeception\Module
{
    public static $nameField            = '#name';
    public static $emailField           = '#email';
    public static $passwordField        = '#password';
    public static $confirmPassword      = '#password-confirm';
    public static $registerButton       = 'Register';

    public static $nameToRegister       = 'Register';
    public static $emailToRegister      = 'registeredUser@test.com';
    public static $passwordToRegister   = 'registerpassword';
    public static $weakPassword         = 'password';

}