<?php
namespace Step\Acceptance\Administrator;

class LoginSteps extends \AcceptanceTester
{

	private $usernameFieldId = ['id' => 'mod-login-username'];

	private $passwordFieldId = ['id' => 'mod-login-password'];

	private $pageTitleClass = ['class' => 'page-title'];

	private $loginButtonPath = ['xpath' => "//button[contains(normalize-space(), 'Log in')]"];

	private $loginPageURL = "/administrator/index.php";

	/**
	 * @When Login into Joomla administrator with username :arg1 and password :arg1
	 */
	public function loginIntoJoomlaAdministratorWithUsernameAndPassword($arg1, $arg2)
	{
		$I = $this;
		$I->amGoingTo('I open Joomla Administrator Login Page');
		$I->amOnPage($this->loginPageURL);
		$I->waitForElement($this->usernameFieldId, 60);
		$I->amGoingTo('Fill Username Text Field');
		$I->fillField($this->usernameFieldId, $arg1);
		$I->amGoingTo('Fill Password Text Field');
		$I->fillField($this->passwordFieldId, $arg2);

		$I->amGoingTo('I click Login button');
		$I->click($this->loginButtonPath);
		$I->amGoingTo('I wait to see Administrator Control Panel');
		$I->waitForText('Control Panel', 4, $this->pageTitleClass);
	}
}