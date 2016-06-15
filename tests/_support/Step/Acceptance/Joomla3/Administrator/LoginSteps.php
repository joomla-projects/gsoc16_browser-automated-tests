<?php

namespace Step\Acceptance\Joomla3\Administrator;

use Page\Acceptance\Joomla3\Administrator\LoginPage;

class LoginSteps extends \AcceptanceTester
{
	/**
	 * @When Login into Joomla administrator with username :arg1 and password :arg1
	 */
	public function loginIntoJoomlaAdministratorWithUsernameAndPassword($arg1, $arg2)
	{
		$I = $this;
		$I->amGoingTo('I open Joomla Administrator Login Page');
		$I->amOnPage(LoginPage::$pageURL);
		$I->waitForElement(LoginPage::$usernameField, 60);
		$I->amGoingTo('Fill Username Text Field');
		$I->fillField(LoginPage::$usernameField, $arg1);
		$I->amGoingTo('Fill Password Text Field');
		$I->fillField(LoginPage::$passwordField, $arg2);

		$I->amGoingTo('I click LoginPage button');
		$I->click(LoginPage::$loginButton);
		$I->amGoingTo('I wait to see Administrator Control Panel');
		$I->waitForText(LoginPage::$controlPanelText, 10, LoginPage::$pageTitle);
	}
}