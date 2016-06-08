<?php
namespace Step\Administrator;

class JoomlaSteps
{
	/**
	 * @Then I should see the :arg1 message
	 */
	private $systemMessageContainerId = "['id' => 'system-message-container']";

	private $pageTitleClass = "['class' => 'page-title']";

	public function iShouldSeeTheMessage($message)
	{
		$I = $this;
		$I->waitForPageTitle('Articles');
		$I->see($message, $this->systemMessageContainerId);

	}

	/**
	 * @Given Joomla CMS is installed
	 */
	public function joomlaCMSIsInstalled()
	{
		$I = $this;

	}

	/**
	 * @Then I see administrator dashboard
	 */
	public function iSeeAdministratorDashboard()
	{
		$I = $this;
		$I->waitForText('Control Panel', 4, $this->pageTitleClass);
	}

	/**
	 * Method is to set Wait for page title
	 *
	 * @param   string   $title    Page Title text
	 * @param   integer  $timeout  Waiting time
	 *
	 * @return  void
	 */
	private function waitForPageTitle($title, $timeout = 60)
	{
		$I = $this;
		$I->waitForText($title, $timeout, $this->pageTitleClass);
	}

}