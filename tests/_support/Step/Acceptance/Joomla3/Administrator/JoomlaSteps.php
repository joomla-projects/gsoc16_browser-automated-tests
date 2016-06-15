<?php

namespace Step\Acceptance\Joomla3\Administrator;

use Page\Acceptance\Joomla3\Administrator\AdminPage;

class JoomlaSteps extends \AcceptanceTester
{
	/**
	 * @Then I should see the :arg1 message
	 */
	public function iShouldSeeTheMessage($message)
	{
		$I = $this;
		$I->waitForPageTitle('Articles');
		$I->see($message, AdminPage::$systemMessageContainer);

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
		$I->waitForText(AdminPage::$controlPanelText, 4, AdminPage::$pageTitle);
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
		$I->waitForText($title, $timeout, AdminPage::$pageTitle);
	}
}