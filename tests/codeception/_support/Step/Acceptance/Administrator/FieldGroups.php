<?php

/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Step
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Step\Acceptance\Administrator;

use Page\Acceptance\Administrator\FieldGroupsManagerPage;
use Page\Acceptance\Administrator\FieldGroupsManagerPage_New;

/**
 * Acceptance Step object class contains suits for Content Manager.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class FieldGroups extends Admin
{
	/**
	 * Method to click toolbar button new from article manager listing page.
	 *
	 * @Given There is a add field group link
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function thereIsAAddFieldGroupLink()
	{
		$I = $this;

		$I->amOnPage(FieldGroupsManagerPage::$url);
	}

	/**
	 * Method to create new field group
	 *
	 * @param   string  $group_titles  The field group title
	 *
	 * @When I fill mandatory fields for creating Field Group
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillMandatoryFieldsForCreatingFieldGroup($group_titles)
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('New');

		$totalRows = count($group_titles->getRows());
		$lastIndex = ($totalRows - 1);

		// Iterate over all rows
		foreach ($group_titles->getRows() as $index => $row)
		{
			if ($index !== 0)
			{
				$I->fillField(FieldGroupsManagerPage_New::$title, $row[0]);

				if ($index == $lastIndex)
				{
					$I->adminPage->clickToolbarButton('Save');
					$I->wait(5);
				}
				else
				{
					$I->adminPage->clickToolbarButton('Save & New');
				}
			}
		}
	}
}
