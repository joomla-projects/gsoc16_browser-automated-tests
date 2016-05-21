<?php
/**
 * @package		 Joomla
 * @subpackage	tests
 *
 * @copyright	 Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license		 GNU General Public License version 2 or later; see LICENSE.txt
 */
class UserCest
{
	public function __construct()
	{
		$this->faker = Faker\Factory::create();
		$this->name	= 'User' . $this->faker->randomNumber();
		$this->username	= 'uname' . $this->faker->randomNumber();
		$this->email = 'test' . $this->faker->randomNumber() . '@joomla.org';
		$this->password = 'test';
	}

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
	}

	public function administratorEditUser(\AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Editing a user');

		$I->doAdministratorLogin();
		$I->amGoingTo('Navigate to Users page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_users&view=users');

		$I->expectTo('see Users page');
		$I->checkForPhpNoticesOrWarnings();
		$I->click($this->name);
		$I->checkForPhpNoticesOrWarnings();
		$I->waitForText('Users: Edit', '30', ['css' => 'h1']);
		$I->fillField(['id' => 'jform_name'], $this->name . '-edited');
		$I->fillField(['id' => 'jform_username'], $this->username. '-edited');
		$I->fillField(['id' => 'jform_email'], 'edited-' . $this->email);
		$I->click('Save & Close');
		$I->waitForText('Users', '30', ['css' => 'h1']);
		$I->checkForPhpNoticesOrWarnings();
		$I->expectTo('see a success message and the user has been updated');
		$I->see('User successfully saved', ['id' => 'system-message-container']);
		$I->searchForItem($this->name . '-edited');
		$I->waitForText('Users', '30', ['css' => 'h1']);
		$I->checkForPhpNoticesOrWarnings();
		$I->expectTo('see the edited username is listed');
		$I->waitForText($this->name);
	}

	public function administratorLockUser(\AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Locking a user');
		$I->doAdministratorLogin();
		$I->amGoingTo('Navigate to Users page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_users&view=users');
		$I->expectTo('see Users page');
		$I->checkForPhpNoticesOrWarnings();
		$I->searchForItem($this->name);
		$I->waitForText($this->name);
		$I->click(['id' => 'cb0']);
		$I->click('Block');
		$I->checkForPhpNoticesOrWarnings();
		$I->waitForText($this->name);
		$I->expectTo('see a success message and the user has been blocked');
		$I->see('User blocked', ['id' => 'system-message-container']);
	}

	public function administratorUnLockUser(\AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Unlocking a user');
		$I->doAdministratorLogin();
		$I->amGoingTo('Navigate to Users page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_users&view=users');
		$I->expectTo('see Users page');
		$I->checkForPhpNoticesOrWarnings();
		$I->searchForItem($this->name);
		$I->waitForText($this->name);
		$I->click(['id' => 'cb0']);
		$I->wait(1);
		$I->click('Unblock');
		$I->checkForPhpNoticesOrWarnings();
		$I->waitForText($this->name);
		$I->expectTo('see a success message and the user has been unlocked');
		$I->see('User enabled', ['id' => 'system-message-container']);
	}

	public function administratorDeleteUser(\AcceptanceTester $I)
	{
		$I->am('Administrator');
		$I->wantToTest('Deleting a user');

		$I->doAdministratorLogin();
		$I->amGoingTo('Navigate to Users page in /administrator/');
		$I->amOnPage('administrator/index.php?option=com_users&view=users');

		$I->expectTo('see Users page');
		$I->checkForPhpNoticesOrWarnings();

		$I->searchForItem($this->name);
		$I->waitForText('Users', '30', ['css' => 'h1']);
		$I->click(['id' => 'cb0']);
		$I->click('Delete');
		$I->acceptPopup();
		$I->waitForText('Users', '30', ['css' => 'h1']);
		$I->checkForPhpNoticesOrWarnings();
		$I->expectTo('see a success message and the user is deleted');
		$I->see('User successfully deleted', ['id' => 'system-message-container']);
	}
}
