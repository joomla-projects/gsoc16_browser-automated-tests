<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
	use _generated\AcceptanceTesterActions;

	/**
	 * Install joomla CMS
	 *
	 * @Given Joomla CMS is installed
	 */
	public function joomlaCMSIsInstalled()
	{
		// throw new \Codeception\Exception\Incomplete("Step `Joomla CMS is installed` is not defined");
	}

	/**
	 * @When Login into Joomla administrator with username :arg1 and password :arg1
	 */
	public function loginIntoJoomlaAdministrator($username, $password)
	{
		$I = $this;
		$I->doAdministratorLogin($username, $password);
	}

	/**
	 * @Then I see administrator dashboard
	 */
	public function iSeeAdministratorDashboard()
	{
		$I = $this;
		$I->waitForPageTitle('Control Panel', 4);
	}

	/**
	 * @Given There is a Add Content link
	 */
	public function thereIsAAddContentLink()
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->clickToolbarButton('New');
	}

	/**
	 * @When I add the content with title :arg1
	 */
	public function iAddTheContentWithTitle($title)
	{
		$I = $this;
		$I->fillField(['id' => 'jform_title'], $title);
	}

	/**
	 * @When I add content body :arg1
	 */
	public function iAddContentBody($body)
	{
		$I = $this;
		$I->click('Toggle editor');
		$I->fillField(['id' => 'jform_articletext'], $body);
	}

	/**
	 * @When I save an article
	 */
	public function iSaveAnArticle()
	{
		$I = $this;
		$I->clickToolbarButton('Save');
	}

	/**
	 * @Then I should see the :arg1 message
	 */
	public function iShouldSeeTheMessage($arg1)
	{
		$I = $this;
		$I->waitForPageTitle('Articles');
		$I->see('Article successfully saved.', ['id' => 'system-message-container']);
	}

	/**
	 * @Given I search and select content article with title :arg1
	 */
	public function iSearchAndSelectContentArticleWithTitle($title)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->fillField(['id' => 'filter_search'], $title);
		$I->click('.icon-search');
		$I->checkAllResults();
	}

	/**
	 * @When I featured the article
	 */
	public function iFeatureTheContentWithTitle()
	{
		$I = $this;
		$I->click(['xpath' => "//div[@id='toolbar-featured']//button"]);
	}

	/**
	 * @Then I save and see the :arg1 message
	 */
	public function iSaveAndSeeTheMessage($arg1)
	{
		$I = $this;
		$I->waitForPageTitle('Articles');
		$I->see('1 article featured.', ['id' => 'system-message-container']);
	}

	/**
	 * @Given I select the content article with title :arg1
	 */
	public function iSelectTheContentArticleWithTitle($title)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->fillField(['id' => 'filter_search'], $title);
		$I->click('.icon-search');
		$I->checkAllResults();
		$I->click(['xpath' => "//div[@id='toolbar-edit']/button"]);
	}

	/**
	 * @Given I set access level as a :arg1
	 */
	public function iSetAccessLevelAsA($accessLevel)
	{
		$I = $this;
		$I->selectOptionInChosenById('jform_access', $accessLevel);
	}

	/**
	 * @When I save the article :arg1
	 */
	public function iSaveTheArticle($arg1)
	{
		$I = $this;
		$I->clickToolbarButton('Save & Close');
	}

	/**
	 * @Given I have article with name :arg1
	 */
	public function iHaveArticleWithName($title)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->fillField(['id' => 'filter_search'], $title);
		$I->click('.icon-search');
		$I->checkAllResults();
	}

	/**
	 * @When I unpublish :arg1
	 */
	public function iUnpublish($title)
	{
		$I = $this;
		$I->clickToolbarButton('unpublish');
	}
	/**
	 * @Then I see article unpublish message :arg1
	 */
	public function iSeeArticleUnpublishMessage($arg1)
	{
		$I = $this;
		$I->waitForPageTitle('Articles');
		$I->see('1 article unpublished.', ['id' => 'system-message-container']);
	}


	/**
	 * @Given I have :arg1 content article which needs to be Trash
	 */
	public function iHaveContentArticleWhichNeedsToBeTrash($title)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->fillField(['id' => 'filter_search'], $title);
		$I->click('.icon-search');
		$I->checkAllResults();
	}

	/**
	 * @When I Trash the article with name :arg1
	 */
	public function iTrashTheArticleWithName($title)
	{
		$I = $this;
		$I->clickToolbarButton('trash');
	}

	/**
	 * @Then I see article trash message :arg1
	 */
	public function iSeeArticleTrashMessage($arg1)
	{
		$I = $this;
		$I->waitForPageTitle('Articles');
		$I->see('1 article trashed.', ['id' => 'system-message-container']);
	}

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
	public function iSeeTheMessage($arg1)
	{
		$I = $this;
		$I->waitForPageTitle('Users');
		$I->see('User successfully saved.', ['id' => 'system-message-container']);
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
	public function iAssignedNameAndUserGroup($name, $username)
	{
		$I = $this;
		$I->fillField(['id' => 'jform_name'], $name);
		$I->click('Assigned User Groups');
		$I->checkOption('#1group_4');
	}
	/**
	 * @Then I should display the :arg1 message
	 */
	public function iShouldDisplayTheMessage($arg1)
	{
		$I = $this;
		$I->clickToolbarButton('Save & Close');
		$I->waitForPageTitle('Users');
		$I->see('User successfully saved.', ['id' => 'system-message-container']);
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
	 * @When I block user name :arg1
	 */
	public function iBlockUserName($arg1)
	{
		$I = $this;
		$I->clickToolbarButton('unpublish');
	}

	/**
	 * @Then I should see the user block message :arg1
	 */
	public function iShouldSeeTheUserBlockMessage($arg1)
	{
		$I = $this;
		$I->waitForPageTitle('Users');
		$I->see('User blocked.', ['id' => 'system-message-container']);
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
	 * @Then I conform the user delete sucessfully by getting message :arg1
	 */
	public function iConformTheUserDeleteSucessfully($message)
	{
		$I = $this;
		$I->checkForPhpNoticesOrWarnings();
		$I->expectTo('see a success message and the user is deleted');
		$I->see($message, ['class' => 'alert-message']);
	}

	/**
	 * Method is to set Wait for page title
	 *
	 * @param   string   $title    Page Title text
	 * @param   integer  $waiting  Waiting time
	 *
	 * @return  void
	 */
	public function waitForPageTitle($title, $timeout = 60)
	{
		$I = $this;
		$I->waitForText($title, $timeout, ['class' => 'page-title']);
	}
}
