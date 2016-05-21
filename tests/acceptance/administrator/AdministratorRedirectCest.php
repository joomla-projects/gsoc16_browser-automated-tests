<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_redirect
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

class AdministratorRedirectCest
{
	public function __construct()
	{
		$this->faker = Faker\Factory::create();
		//$this->title  = 'Redirect' . $this->faker->randomNumber();
		//$this->oldurl  = $this->faker->url();
		$this->oldurl  = 'test'.$this->faker->randomNumber().'.htm';
		$this->newurl = 'http://www.test.com';
	}

	public function administratorVerifyAvailableTab(AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Redirect Edit View Tab');

		$I->doAdministratorLogin();

		$I->amGoingTo('Navigate to Redirect page in /administrator/ and verify the Tab');
		$I->amOnPage('administrator/index.php?option=com_redirect');
		$I->waitForText('Redirects: Links', '30', ['css' => 'h1']);
		$I->clickToolbarButton('New');
		$I->waitForText('Redirects: New', '30', ['css' => 'h1']);
		$I->verifyAvailableTabs(['New Link']);
	}

	public function administratorCreateRedirect(AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Redirect creation in /administrator/');

		$I->doAdministratorLogin();

		// Get the redirect StepObject
		$I->amGoingTo('Navigate to Redirect page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_redirect');
		$I->waitForText('Redirects: Links', '30', ['css' => 'h1']);
		$I->expectTo('see redirect page');
		$I->checkForPhpNoticesOrWarnings();

		$I->amGoingTo('try to save a redirect with a filled title and URL');
		$I->clickToolbarButton('New');
		$I->waitForText('Redirects: New', '30', ['css' => 'h1']);
		$I->fillField(['id' => 'jform_old_url'], $this->oldurl);
		$I->fillField(['id' => 'jform_new_url'], $this->newurl);
		$I->clickToolbarButton('Save & Close');
		$I->waitForText('Redirects: Links', '30', ['css' => 'h1']);
		$I->expectTo('see a success message and the redirct added after saving the new redirect');
		$I->see('Link successfully saved.', ['id' => 'system-message-container']);
		$I->cantSee($this->oldurl,['xpath'=>'//form/table']);
	}

	/**
	 * @depends administratorCreateRedirect
	 */
	public function administratorTrashRedirect(AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Redirect removal in /administrator/');

		$I->doAdministratorLogin();

		$I->amGoingTo('Navigate to Redirect page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_redirect');
		$I->waitForText('Redirects: Links','30',['css' => 'h1']);
		$I->expectTo('see redirect page');

		$I->amGoingTo('Search the just saved redirect');
		$I->searchForItem($this->oldurl);
		$I->waitForText('Redirects: Links','30',['css' => 'h1']);

		$I->amGoingTo('Delete the just saved redirect');
		$I->checkAllResults();
		$I->clickToolbarButton('Trash');
		$I->waitForText('Redirects: Links','30',['css' => 'h1']);
		$I->expectTo('see a success message and the redirect removed from the list');
		$I->see('Link successfully trashed',['id' => 'system-message-container']);
		$I->cantSee($this->oldurl,['xpath'=>'//form/table']);
	}

	/**
	 * @depends administratorTrashRedirect
	 */
	public function administratorDeleteRedirect(AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Redirect removal in /administrator/');

		$I->doAdministratorLogin();

		$I->amGoingTo('Navigate to Redirect page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_redirect');
		$I->waitForText('Redirects: Links','30',['css' => 'h1']);
		$I->expectTo('see redirect page');
		$I->click('Search Tools');
		$I->wait(1);
		$I->selectOptionInChosenById('filter_state','Trashed');
		$I->amGoingTo('Search the just saved redirect');
		$I->searchForItem($this->oldurl);
		$I->waitForText('Redirects: Links','30',['css' => 'h1']);

		$I->amGoingTo('Delete the just saved redirect');
		$I->checkAllResults();
		$I->click(['xpath'=> '//div[@id="toolbar-delete"]/button']);
		$I->acceptPopup();
		$I->waitForText('Redirects: Links','30',['css' => 'h1']);
		$I->expectTo('see a success message and the redirect removed from the list');
		$I->see('Link successfully deleted',['id' => 'system-message-container']);
		$I->cantSee($this->oldurl,['xpath'=>'//form/table']);
	}

	public function administratorCreateRedirectWithoutTitleFails(AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Redirect creation without title fails in /administrator/');

		$I->doAdministratorLogin();

		$I->amGoingTo('Navigate to Redirect page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_redirect');
		$I->waitForText('Redirects: Links','30',['css' => 'h1']);
		$I->expectTo('see redirect page');
		$I->checkForPhpNoticesOrWarnings();

		$I->amGoingTo('try to save a redirect with empty oldurl and newurl and it should fail');
		$I->click(['xpath'=> "//button[@onclick=\"Joomla.submitbutton('link.add')\"]"]);
		$I->waitForText('Redirects: New','30',['css' => 'h1']);
		$I->click(['xpath'=> "//button[@onclick=\"Joomla.submitbutton('link.apply')\"]"]);
		$I->expectTo('see an error when trying to save a redirect without oldurl and without newurl');
		$I->see('Invalid field:  Source URL',['id' => 'system-message-container']);
		$I->see('Invalid field:  Destination URL',['id' => 'system-message-container']);
	}
	public function administratorVerifyPluginDisabled(AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Redirect plugin is disabled as default in /administrator/');

		$I->doAdministratorLogin();

		$I->amGoingTo('Navigate to Redirect page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_redirect');
		$I->waitForText('Redirects: Links','30',['css' => 'h1']);
		$I->expectTo('see error message for disabled plugin');
		$I->see('The Redirect Plugin is disabled',['id' => 'system-message-container']);		
	}
}
