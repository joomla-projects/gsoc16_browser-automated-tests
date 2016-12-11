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
use Page\Acceptance\Administrator\ContactManagerPage;
use Page\Acceptance\Administrator\ControlPanelPage;

/**
 * Acceptance Step object class contains suits for Contact Manager.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class Contact extends Admin
{
	/**
	 * @Given There is a add contact link
	 */
	public function thereIsAAddContactLink()
	{
		$I = $this;

		$I->amOnPage(ContactManagerPage::$url);
		$I->adminPage->clickToolbarButton('New');
	}

	/**
	 * @When I create new contact with field name as :arg1
	 */
	public function iCreateNewContactWithFieldNameAs($name)
	{
		$this->contactManagerPage->fillContactCreateForm($name);
	}

	/**
	 * @When I save the contact :arg1
	 */
	public function iSaveTheContact($name)
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('Save & Close');
		$I->searchForItem($name);
		$I->checkExistenceOf($name);
	}

	/**
	 * @Then I should see the contact :arg1 is created
	 */
	public function iShouldSeeTheContactIsCreated($name)
	{
		$I = $this;

		$I->contactManagerPage->seeItemIsCreated($name);
	}

	/**
	 * @Given I select the contact with name :$name
	 */
	public function iSelectTheContactWithName($name)
	{
		$this->contactManagerPage->haveItemUsingSearch($name);
	}

	/**
	 * @When I change access level as a :arg1
	 */
	public function iChangeAccessLevelAsA($accessLevel)
	{
		$I = $this;

		$I->adminPage->selectOptionInChosenByIdUsingJs('jform_access', $accessLevel);
	}

	/**
	 * @Then I should see the :arg1 as contact access level
	 */
	public function iShouldSeeTheAsContactAccessLevel($accessLevel)
	{
		$I = $this;

		$I->see($accessLevel, ContactManagerPage::$seeAccessLevel);
	}

	/**
	 * @Given I have contact with name :arg1
	 */
	public function iHaveContactWithName($name)
	{
		$this->contactManagerPage->haveItemUsingSearch($name);
	}

	/**
	 * @When I unpublish the contact
	 */
	public function iUnpublishTheContact()
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('unpublish');

	}

	/**
	 * @Then I should see the contact is now unpublished
	 */
	public function iShouldSeeTheContactIsNowUnpublished()
	{
		$I = $this;

		$I->seeNumberOfElements(ContactManagerPage::$seeUnpublished, 1);
	}

	/**
	 * @Given I have :arg1 contact which needs to be Trashed
	 */
	public function iHaveContactWhichNeedsToBeTrashed($name)
	{
		$this->contactManagerPage->haveItemUsingSearch($name);
	}

	/**
	 * @When I Trash the contact
	 */
	public function iTrashTheContact()
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('trash');
	}

	/**
	 * @Then I should see the contact :arg1 in trash
	 */
	public function iShouldSeeTheContactInTrash($name)
	{
		$I = $this;

		$I->contactManagerPage->seeItemInTrash($name, ContactManagerPage::$contactTitle);
	}

	/**
	 * @Given I select the contact with the name :arg1
	 */
	public function iSelectTheContactWithTheName($name)
	{
		$I = $this;

		$I->contactManagerPage->haveItemUsingSearch($name);
		$I->adminPage->clickToolbarButton('edit');
	}

	/**
	 * @Given I have :arg1 contact which is need to be Trashed
	 */
	public function iHaveContactWhichIsNeedToBeTrashed($name)
	{
		$this->contactManagerPage->haveItemUsingSearch($name);
	}

	/**
	 * @Given I have :arg1 contact which is Trashed
	 */
	public function iHaveContactWhichIsTrashed($name)
	{
		$I = $this;
		$I->amOnPage(ContactManagerPage::$url);
		$I->waitForText(ContactManagerPage::$contactTitle);
		$I->selectOptionInChosenByIdUsingJs('filter_published', "Trashed");
		$I->searchForItem($name);
		$I->checkExistenceOf($name);
	}

	/**
	 * @When I empty the trash
	 */
	public function iEmptyTheTrash()
	{
		$I = $this;
		$I->checkAllResults();
		$I->clickToolbarButton('Empty trash');
		$I->acceptPopup();
	}

	/**
	 * @Then I should not see the contact :arg1 in trash
	 */
	public function iShouldNotSeeTheContactInTrash($name)
	{
		$I = $this;
		$I->selectOptionInChosenByIdUsingJs('filter_published', "Trashed");
		$I->searchForItem($name);
		$I->dontSee($name);
	}
}
