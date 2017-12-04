<?php 
$I = new AcceptanceTester($scenario);
$I->maximizeWindow();
$I->wantTo('test empty inputs validation for contacts page');
$I->amOnPage('/contact');
$I->fillField('senderEmail','');
$I->fillField('senderName','');
$I->fillField('senderSubject','');
$I->fillField('senderContent','');
$I->click('submit');
$I->wait(5);
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

