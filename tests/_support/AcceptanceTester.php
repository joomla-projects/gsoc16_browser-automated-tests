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
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
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
	 * @Then I should see the article :arg1 in the joomla frontend
	 */
	public function iShouldSeeTheArticleInTheJoomlaFrontend($arg1)
	{
		$I = $this;
		$I->amOnPage('/');
		// @todo
	}


	/**
     * @Given there is a content article with title :arg1
     */
    public function thereIsAContentArticleWithTitle($My_Article)
    {
	    $I = $this;
	    $I->wantTo('create article');
	    $I->click('nav nav-hover');
	    $I->click('');
	    $I->click('Featured Articles');
	    $I->fillField('Title', $My_Article);
	    $I->click('save');


    }

    /**
     * @When I feature the content with title :arg1
     */
    public function iFeatureTheContentWithTitle($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I feature the content with title :arg1` is not defined");
    }

    /**
     * @Then I should see the published article :arg1 in the joomla home page
     */
    public function iShouldSeeThePublishedArticleInTheJoomlaHomePage($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the published article :arg1 in the joomla home page` is not defined");
    }

    /**
     * @Given I select the content article with title :arg1
     */
    public function iSelectTheContentArticleWithTitle($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I select the content article with title :arg1` is not defined");
    }

    /**
     * @Given change the title :arg1
     */
    public function changeTheTitle($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `change the title :arg1` is not defined");
    }

    /**
     * @When I try to post :arg1
     */
    public function iTryToPost($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I try to post :arg1` is not defined");
    }

    /**
     * @Then I should see the :arg1
     */
    public function iShouldSeeThe($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the :arg1` is not defined");
    }

    /**
     * @Then published article :arg1 in the joomla home page
     */
    public function publishedArticleInTheJoomlaHomePage($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `published article :arg1 in the joomla home page` is not defined");
    }

    /**
     * @Given I have article with name :arg1
     */
    public function iHaveArticleWithName($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I have article with name :arg1` is not defined");
    }

    /**
     * @When I un publish :arg1
     */
    public function iUnPublish($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I un publish :arg1` is not defined");
    }

    /**
     * @Then I can not see the article :arg1 in the joomla home page
     */
    public function iCanNotSeeTheArticleInTheJoomlaHomePage($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I can not see the article :arg1 in the joomla home page` is not defined");
    }

    /**
     * @Given I have one content article which needs to be removed
     */
    public function iHaveOneContentArticleWhichNeedsToBeRemoved()
    {
        throw new \Codeception\Exception\Incomplete("Step `I have one content article which needs to be removed` is not defined");
    }

    /**
     * @When I delete the article with name :arg1
     */
    public function iDeleteTheArticleWithName($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I delete the article with name :arg1` is not defined");
    }

    /**
     * @Then I should not see in joomla site frontend
     */
    public function iShouldNotSeeInJoomlaSiteFrontend()
    {
        throw new \Codeception\Exception\Incomplete("Step `I should not see in joomla site frontend` is not defined");
    }

    /**
     * @Given I have article with title :arg1
     */
    public function iHaveArticleWithTitle($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I have article with title :arg1` is not defined");
    }

    /**
     * @Given set access to registered
     */
    public function setAccessToRegistered()
    {
        throw new \Codeception\Exception\Incomplete("Step `set access to registered` is not defined");
    }

    /**
     * @When I do login with registered user :arg1 and password :arg2
     */
    public function iDoLoginWithRegisteredUserAndPassword($arg1, $arg2)
    {
        throw new \Codeception\Exception\Incomplete("Step `I do login with registered user :arg1 and password :arg2` is not defined");
    }

    /**
     * @Then I should see the registered article in the joomla home page
     */
    public function iShouldSeeTheRegisteredArticleInTheJoomlaHomePage()
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the registered article in the joomla home page` is not defined");
    }

}
