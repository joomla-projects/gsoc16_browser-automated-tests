<?php
namespace Step\Acceptance\Administrator;

class User extends \AcceptanceTester
{
	/**
	 * @Given There is a add user link
	 */
	public function thereIsAAddUserLink()
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_users&view=users');
		$I->clickToolbarButton('New');
	}

	/**
	 * @When I enter the Name :arg1
	 */
	public function iEnterTheName($name)
	{
		$I =$this;
		$I->fillField(['id' => 'jform_name'], $name);
	}

	/**
	 * @When I enter the Login Name :arg1
	 */
	public function iEnterTheLoginName($username)
	{
		$I = $this;
		$I->fillField(['id' => 'jform_username'], $username);
	}

	/**
	 * @When I enter the Password :arg1
	 */
	public function iEnterThePassword($password)
	{
		$I = $this;
		$I->fillField(['id' => 'jform_password'], $password);
	}

	/**
	 * @When I enter the Confirm Password :arg1
	 */
	public function iEnterTheConfirmPassword($Confirm_Password)
	{
		$I = $this;
		$I->fillField(['id' => 'jform_password2'], $Confirm_Password);
	}

	/**
	 * @When I enter the Email :arg1
	 */
	public function iEnterTheEmail($email)
	{
		$I = $this;
		$I->fillField(['id' => 'jform_email'], $email);
	}

	/**
	 * @Then I Save the  user
	 */
	public function iSaveTheUser()
	{
		$I = $this;
		$I->clickToolbarButton('Save & Close');
	}

	/**
	 * @Then I see the :arg1 message
	 */
	public function iSeeTheMessage($message)
	{
		$I = $this;
		$I->waitForPageTitle('Users');
		$I->see($message, ['id' => 'system-message-container']);
	}

	/**
	 * @Given I search and select the user with user name :arg1
	 */
	public function iSearchAndSelectTheUserWithUserName($username)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_users&view=users');
		$I->fillField(['id' => 'filter_search'], $username);
		$I->click('.icon-search');
		$I->checkAllResults();
		$I->clickToolbarButton('edit');
	}

	/**
	 *  @When I set name as an :arg1 and User Group as :arg1
	 */
	public function iAssignedNameAndUserGroup($name, $userGroup)
	{
		$I = $this;
		$I->fillField(['id' => 'jform_name'], $name);
		$I->click('Assigned User Groups');

		// @todo use $userGroup variable to select user group dynamically
		$I->checkOption('#1group_4');
	}
	/**
	 * @Then I should display the :arg1 message
	 */
	public function iShouldDisplayTheMessage($message)
	{
		$I = $this;
		$I->clickToolbarButton('Save & Close');
		$I->waitForPageTitle('Users');
		$I->see($message, ['id' => 'system-message-container']);
	}

	/**
	 * @Given I have a user with user name :arg1
	 */
	public function iHaveAUserWithUserName($username)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_users&view=users');
		$I->fillField(['id' => 'filter_search'], $username);
		$I->click('.icon-search');
		$I->checkAllResults();
	}

	/**
	 * @When I block the user
	 */
	public function iBlockTheUser()
	{
		$I = $this;
		$I->clickToolbarButton('unpublish');
	}

	/**
	 * @Then I should see the user block message :arg1
	 */
	public function iShouldSeeTheUserBlockMessage($message)
	{
		$I = $this;
		$I->waitForPageTitle('Users');
		$I->see($message, ['id' => 'system-message-container']);
	}

	/**
	 * @Given I have a blocked user with user name :arg1
	 */
	public function iHaveABlockedUserWithUserName($username)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_users&view=users');
		$I->fillField(['id' => 'filter_search'], $username);
		$I->click('.icon-search');
		$I->checkAllResults();
	}

	/**
	 * @When I unblock the user
	 */
	public function iUnblockTheUser()
	{
		$I = $this;
		$I->waitForPageTitle('Users');
		$I->click(['xpath' => "//div[@id='toolbar-unblock']//button"]);
	}

	/**
	 * @Then I should see the user unblock message :arg1
	 */
	public function iShouldSeeTheUserUnblockMessage($message)
	{
		$I = $this;
		$I->waitForPageTitle('Users');
		$I->see($message, ['id' => 'system-message-container']);
	}

	/**
	 * @When I Delete the user :arg1
	 */
	public function iDeleteTheUser($username)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_users&view=users');
		$I->fillField(['id' => 'filter_search'], $username);
		$I->click('.icon-search');
		$I->checkAllResults();
		$I->clickToolbarButton('empty trash');
		$I->acceptPopup();
	}

	/**
	 * @Then I confirm the user should have been deleted by getting the message :arg1
	 */
	public function iConfirmTheUserDeleteSucessfully($message)
	{
		$I = $this;
		$I->checkForPhpNoticesOrWarnings();
		$I->expectTo('see a success message and the user is deleted');
		$I->see($message, ['class' => 'alert-message']);
	}
}