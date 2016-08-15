<?php
/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Step
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Step\Acceptance\Administrator;

use Page\Acceptance\Administrator\AdminPage;

/**
 * Acceptance Step object class for admin steps.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class Admin extends \AcceptanceTester
{
	/**
	 * Method to confirm message appear
	 *
	 * @param   string  $message  The message to be confirm
	 *
	 * @Then I should see the :message message
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeTheMessage($message)
	{
		$I = $this;

		$I->waitForText($message, TIMEOUT, AdminPage::$systemMessageContainer);
		$I->see($message, AdminPage::$systemMessageContainer);
	}
}