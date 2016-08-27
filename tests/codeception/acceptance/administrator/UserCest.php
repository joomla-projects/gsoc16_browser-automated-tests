
<?php
/**
 * @package     Joomla
 * @subpackage  tests
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
class UserCest
{
	public function __construct()
	{
		$I = $this;

		$I->faker = Faker\Factory::create();
		$I->name  = 'User' . $I->faker->randomNumber();
		$I->username  = 'uname' . $I->faker->randomNumber();
		$I->email = 'test@joomla.org';
		$I->password = 'test';
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
}