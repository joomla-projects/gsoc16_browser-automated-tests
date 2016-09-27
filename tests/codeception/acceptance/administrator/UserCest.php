<?php
/**
 * @package     Joomla.Tests
 * @subpackage  Acceptance.tests
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
class UserCest
{
	/**
	 * Constructor to set up the new User infos
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function __construct()
	{
		$this->name     = 'TestUser';
		$this->username = 'testuname';
		$this->email    = 'testuname@joomla.org';
		$this->password = 'test';
	}

	/**
	 * Create User in the Backend
	 *
	 * @param   AcceptanceTester  $I  The AcceptanceTester Object
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function administratorCreateUser(\AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Creating a user');

		$I->doAdministratorLogin();
		$I->amGoingTo('Navigate to Users page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_users&view=users');

		$I->expectTo('see Users page');
		$I->checkForPhpNoticesOrWarnings();

		$I->amGoingTo('try to save a user with a filled name, email, username and password');
		$I->clickToolbarButton('New');

		$I->waitForText('Users: New', '30', ['css' => 'h1']);
		$I->checkForPhpNoticesOrWarnings();

		$I->fillField(['id' => 'jform_name'], $this->name);
		$I->fillField(['id' => 'jform_username'], $this->username);
		$I->fillField(['id' => 'jform_email'], $this->email);
		$I->fillField(['id' => 'jform_password'], $this->password);
		$I->fillField(['id' => 'jform_password2'], $this->password);

		$I->clickToolbarButton('Save & Close');

		$I->waitForText('Users', '30', ['css' => 'h1']);
		$I->expectTo('see a success message and the user added after saving the user');
		$I->see('User successfully saved', ['id' => 'system-message-container']);

		$I->amGoingTo('delete the created user so that this test is repeatable');
		$I->amGoingTo('search for "' . $this->username . '"');
		$I->fillField(['id' => 'filter_search'], $this->username);
		$I->click(['class' => 'icon-search']);

		$I->comment("Selecting Checkall button");
		$I->click(['xpath' => "//thead//input[@name='checkall-toggle' or @name='toggle']"]);

		$I->comment("Click Delete button");
		$I->click(['xpath' => "//div[@id='toolbar-delete']//button"]);
		$I->acceptPopup();
	}
}