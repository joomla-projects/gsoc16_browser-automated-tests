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
	public function loginIntoJoomlaAdministratorWithUsernameAndPassword($username, $password)
	{
		$I = $this;
		$I->amOnPage('administrator/');
		$I->fillField('Username', $username);
		$I->fillField('passwd', $password);
		$I->click('Log in');
	}

	/**
	 * @Then I see administrator dashboard
	 */
	public function iSeeAdministratorDashboard()
	{
		$I = $this;
		$I->see('Control Panel', 'h1');
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
		$I->fillField('#jform_title', $title);
	}

	/**
	 * @When I add content body :arg1
	 */
	public function iAddContentBody($body)
	{
		$I = $this;
		$I->click('Toggle editor');
		$I->fillField('#jform_articletext', $body);
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
		$I->waitForText('Articles', 60, ['css' => '.page-title']);
		$I->see('Article successfully saved.', ['id' => 'system-message-container']);
	}

	/**
	 * @Given I search and select content article with title :arg1
	 */
	public function iSearchAndSelectContentArticleWithTitle($title)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->fillField('#filter_search', $title);
		$I->click('.icon-search');
		$I->checkAllResults();
	}

	/**
	 * @When I feature the content with title :arg1
	 */
	public function iFeatureTheContentWithTitle($title)
	{
		$I = $this;
		$I->click(['xpath' => "//div[@id='toolbar-featured']/button"]);
	}

	/**
	 * @Then I save and see the :arg1 message
	 */
	public function iSaveAndSeeTheMessage($arg1)
	{
		$I = $this;
		$I->waitForText('Articles', 60, ['css' => '.page-title']);
		$I->see('1 article featured.', ['id' => 'system-message-container']);
	}

	/**
	 * @Given I select the content article with title :arg1
	 */
	public function iSelectTheContentArticleWithTitle($title)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->fillField('#filter_search', $title);
		$I->click('.icon-search');
		$I->checkAllResults();
		$I->click(['xpath' => "//div[@id='toolbar-edit']/button"]);
	}

	/**
	 * @Given I set access level as a register
	 */
	public function iSetAccessLevelAsARegister()
	{
		$I = $this;
		$I->selectOptionInChosenById('jform_access', 'Registered');

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
		$I->fillField('#filter_search', $title);
		$I->click('.icon-search');
		$I->checkAllResults();
	}

	/**
	 * @When I unpublish :arg1
	 */
	public function iUnpublish($title)
	{
		$I = $this;
		$I->click(['xpath' => "//div[@id='toolbar-unpublish']/button"]);

	}
	/**
	 * @Then I see article unpublish message :arg1
	 */
	public function iSeeArticleUnpublishMessage($arg1)
	{
		$I = $this;
		$I->waitForText('Articles', 60, ['css' => '.page-title']);
		$I->see('1 article unpublished.', ['id' => 'system-message-container']);
	}


	/**
	 * @Given I have :arg1 content article which needs to be Trash
	 */
	public function iHaveContentArticleWhichNeedsToBeTrash($title)
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->fillField('#filter_search', $title);
		$I->click('.icon-search');
		$I->checkAllResults();
	}

	/**
	 * @When I Trash the article with name :arg1
	 */
	public function iTrashTheArticleWithName($title)
	{
		$I = $this;
		$I->click(['xpath' => "//div[@id='toolbar-trash']/button"]);
	}
	/**
	 * @Then I see article trash message :arg1
	 */
	public function iSeeArticleTrashMessage($arg1)
	{
		$I = $this;
		$I->waitForText('Articles', 60, ['css' => '.page-title']);
		$I->see('1 article trashed.', ['id' => 'system-message-container']);
	}

}
