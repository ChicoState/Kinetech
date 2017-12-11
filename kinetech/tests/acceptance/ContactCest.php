<?php
/*
 * @author Jordan Laney <jlaney4@mail.csuchico.edu>
 *
 * Acceptance testing for contact email page. 
 */

class ContactCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->maximizeWindow();
        $I->amOnPage('/contact');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testEmptyInputs(AcceptanceTester $I)
    {
        $I->wantTo('test empty inputs validation for contacts page');
        $I->amOnPage('/contact');
        $I->fillField('senderEmail','');
        $I->fillField('senderName','');
        $I->fillField('senderSubject','');
        $I->fillField('senderContent','');
        $I->click('submit');
        $I->wait(5);
    }

    public function testInvalidInputs(AcceptanceTester $I)
    {
        $I->wantTo('invalid inputs for email and content for contacts page');
        $I->fillField('senderEmail','donkey');
        $I->fillField('senderName','Kong');
        $I->fillField('senderSubject','Super Nintendo');
        $I->fillField('senderContent','Bananas');
        $I->click('submit');
        $I->wait(5);
        $I->fillField('senderEmail','donkey@kong');
        $I->click('submit');
        $I->wait(5);
        $I->fillField('senderEmail','donkey@kong');
        $I->fillField('senderName','Kong');
        $I->fillField('senderSubject','Super Nintendo');
        $I->fillField('senderContent','Bananas, are good. I am a gorilla so I like them.');
        $I->click('submit');
        $I->wait(10);
    }
}
