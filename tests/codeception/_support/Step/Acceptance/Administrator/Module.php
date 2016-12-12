<?php

/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Step
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Step\Acceptance\Administrator;

use Codeception\Util\Locator;
use Page\Acceptance\Administrator\AdminPage;
use Page\Acceptance\Administrator\ModuleManagerPage;
use Page\Acceptance\Administrator\ModuleEditPage;

/**
 * Acceptance Step object class contains suits for User Manager.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class Module extends Admin {

    protected static $moduleTitle = "My Title for the custom Module";
    protected static $moduleTitle_Edit = "My Title for the new custom Module for editing";

    /**
     * @When I create new custom module
     */
    public function iCreateNewCustomModule()
    {
	$I = $this;

	$I->adminPage->clickToolbarButton('New');
	// @todo create a page object for module type selection page
	
	$I->scrollTo(['xpath' => "//a/strong[text()='Custom']"],0,-150);
	$I->click("Custom");
	$I->wait(1);
	// fill the fields
	$I->moduleEditPage->fillModuleTitle(self::$moduleTitle);
	$I->scrollTo(['css' => 'div.toggle-editor']);
	$I->moduleEditPage->fillModuleContent("Content of my custom Module");
    }

    /**
     * @When I Save the module
     */
    public function iSaveTheModule()
    {
	$I = $this;

	$I->adminPage->clickToolbarButton('Save & Close');
    }

    /**
     * @Then I should see the success message
     */
    public function iShouldSeeTheSuccessMessage()
    {
	$I = $this;

	$I->moduleManagerPage->seeSystemMessage(ModuleManagerPage::$pageTitleText, "Module successfully saved");
    }

    /**
     * @Then I should see the custom module is created
     */
    public function iShouldSeeTheCustomModuleIsCreated()
    {
	$I = $this;

	$I->moduleManagerPage->seeItemIsCreated(self::$moduleTitle);
    }

    /**
     * @When I am in the module manager
     */
    public function iAmInTheModuleManager()
    {
	$I = $this;

	$I->amOnPage(ModuleManagerPage::$url);
    }

    /**
     * @Given I have an module to edit
     */
    public function iHaveAnModuleToEdit()
    {
	$I = $this;

	$I->adminPage->clickToolbarButton('New');
	$I->wait(1);
	// @todo create a page object for module type selection page
	$I->scrollTo(['xpath' => "//a/strong[text()='Custom']"],0,-150);
	$I->click("Custom");
	$I->wait(1);
	// fill the fields
	$I->moduleEditPage->fillModuleTitle(self::$moduleTitle);
	$I->scrollTo(['css' => 'div.toggle-editor']);
	$I->moduleEditPage->fillModuleContent("Content of my custom Module");
	$I->adminPage->clickToolbarButton('Save & Close');
    }

    /**
     * @Given I edit the module title
     */
    public function iEditTheModuleTitle()
    {
	$I = $this;

	$I->moduleManagerPage->haveItemUsingSearch(self::$moduleTitle);
	$I->adminPage->clickToolbarButton('edit');
	$I->fillField(ModuleEditPage::$titleField, self::$moduleTitle_Edit);
    }

    /**
     * @Then I should see the module is saved with the new title
     */
    public function iShouldSeeTheModuleIsSavedWithTheNewTitle()
    {
	$I = $this;

	$I->moduleManagerPage->seeItemIsCreated(self::$moduleTitle_Edit);
    }

    /**
     * @Given I have a custom module
     */
    public function iHaveACustomModule()
    {
	$I = $this;

	$I->moduleManagerPage->seeItemIsCreated(self::$moduleTitle);
    }

    /**
     * @When I unpublish the custom module
     */
    public function iUnpublishTheCustomModule()
    {
	$I = $this;

	$I->moduleManagerPage->haveItemUsingSearch(self::$moduleTitle);
	$I->adminPage->clickToolbarButton('unpublish');
    }

    /**
     * @Then I should see the custom module is now unpublished
     */
    public function iShouldSeeTheCustomModuleIsNowUnpublished()
    {
	$I = $this;

	$I->moduleManagerPage->seeSystemMessage(ModuleManagerPage::$pageTitleText, "successfully unpublished");
	$I->moduleManagerPage->seeItemInUnpublished(self::$moduleTitle, ModuleManagerPage::$pageTitleText);
    }

    /**
     * @When I publish the module
     */
    public function iPublishTheModule()
    {
	$I = $this;

	$I->moduleManagerPage->haveItemUsingSearch(self::$moduleTitle);
	$I->wait(1);
	$I->adminPage->clickToolbarButton('publish');
    }

    /**
     * @Then I should see the custom module is now published
     */
    public function iShouldSeeTheCustomModuleIsNowPublished()
    {
	$I = $this;

	$I->moduleManagerPage->seeSystemMessage(ModuleManagerPage::$pageTitleText, "successfully published");
	$I->moduleManagerPage->seeItemInPublished(self::$moduleTitle, ModuleManagerPage::$pageTitleText);
    }

    /**
     * @When I duplicate the custom module
     */
    public function iDuplicateTheCustomModule()
    {
	$I = $this;

	$I->moduleManagerPage->haveItemUsingSearch(self::$moduleTitle);
	$I->adminPage->clickToolbarButton('duplicate');
    }

    /**
     * @Then I should see the duplicated module
     */
    public function iShouldSeeTheDuplicatedModule()
    {
	$I = $this;

	$I->moduleManagerPage->seeSystemMessage(ModuleManagerPage::$pageTitleText, "successfully duplicated");
	$I->moduleManagerPage->seeItemInUnpublished(self::$moduleTitle . " (2)", ModuleManagerPage::$pageTitleText);
    }

    /**
     * @When I trash the module
     */
    public function iTrashTheModule()
    {
	$I = $this;

	$I->moduleManagerPage->haveItemUsingSearch(self::$moduleTitle);
	$I->adminPage->clickToolbarButton('trash');
    }

    /**
     * @Then I should see the module is now trashed
     */
    public function iShouldSeeTheModuleIsNowTrashed()
    {
	$I = $this;

	$I->moduleManagerPage->seeSystemMessage(ModuleManagerPage::$pageTitleText, "successfully trashed");
	$I->moduleManagerPage->seeItemInTrash(self::$moduleTitle, ModuleManagerPage::$pageTitleText);
    }

    /**
     * @When I empty trash
     */
    public function iEmptyTrash()
    {
	$I = $this;

	$I->moduleManagerPage->seeItemInTrash(self::$moduleTitle, ModuleManagerPage::$pageTitleText);
	$I->moduleManagerPage->checkAllResults();
	$I->moduleManagerPage->clickToolbarButton('empty trash');
	$I->acceptPopup();
    }

    /**
     * @Then I should see an empty trash
     */
    public function iShouldSeeAnEmptyTrash()
    {
	$I = $this;

	$I->moduleManagerPage->seeSystemMessage(ModuleManagerPage::$pageTitleText, "successfully deleted.");
	$I->moduleManagerPage->see("There are no modules matching your query", ['css'=>'div.alert']);

    }

    /**
     * @Given the custom module is checked out
     */
    public function theCustomModuleIsCheckedOut()
    {
	$I = $this;

	$I->moduleManagerPage->haveItemUsingSearch(self::$moduleTitle);
	$I->adminPage->clickToolbarButton('edit');
	$I->iAmInTheModuleManager();
	

    }

    /**
     * @When I check in the custom module
     */
     public function iCheckInTheCustomModule()
     {
	$I = $this;

	$I->moduleManagerPage->haveItemUsingSearch(self::$moduleTitle);
	$I->moduleManagerPage->clickToolbarButton('check-in');
     }

    /**
     * @Then I should see the custom module is now checked in
     */
     public function iShouldSeeTheCustomModuleIsNowCheckedIn()
     {
	$I = $this;

	$I->moduleManagerPage->seeSystemMessage(ModuleManagerPage::$pageTitleText, "successfully checked in.");
	$I->dontSeeElement(['class'=>'icon-checkedout']);	
    }

    /**
     * @Given I have a trashed module
     */
     public function iHaveATrashedModule()
     {
	$I = $this;

	$I->moduleManagerPage->seeItemInTrash(self::$moduleTitle, ModuleManagerPage::$pageTitleText);
     }

    /**
     * @Then I should see the trashed module is now published
     */
     public function iShouldSeeTheTrashedModuleIsNowPublished()
     {
	$I = $this;

	$I->moduleManagerPage->seeSystemMessage(ModuleManagerPage::$pageTitleText, "successfully published.");
	$I->wait(1);
	$I->moduleManagerPage->selectOptionInChosenById(ModuleManagerPage::$filterPublished, 'Published');
	$I->moduleManagerPage->waitForPageTitle(ModuleManagerPage::$pageTitleText);
	$I->moduleManagerPage->see(self::$moduleTitle, ModuleManagerPage::$seeName);
     }
    
}
