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
use Page\Acceptance\Administrator\MenuItemManagerPage;
use Page\Acceptance\Administrator\MenuManagerPage;
use Behat\Gherkin\Node\TableNode;

/**
 * Acceptance Step object class contains suits for Menu Manager.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class MenuItem extends Admin
{

    /**
     * @Given There is an menu link
     */
    public function thereIsAnMenuLink()
    {
        $I = $this;

        $I->amOnPage(MenuItemManagerPage::$url);
        $I->adminPage->clickToolbarButton('New');
    }

    /**
     * @When I check available tabs in menu
     */
    public function iCheckAvailableTabsInMenu()
    {
        $I = $this;

        $I->adminPage->clickToolbarButton('New');
        $I->waitForText('Menus: New Item');
    }

    /**
     * @Then I see the available tabs :arg1, :arg2, :arg3, :arg4, :arg5
     */
    public function iSeeTheAvailableTabs($arg1, $arg2, $arg3, $arg4, $arg5)
    {
        $I = $this;

        $I->adminPage->verifyAvailableTabs([$arg1, $arg2, $arg3, $arg4, $arg5]);    }

    /**
     * @When I Login into Joomla administrator with username :arg1 and password :arg1
     */
    public function iLoginIntoJoomlaAdministratorWithUsernameAndPassword($arg1, $arg2)
    {
        throw new \Codeception\Exception\Incomplete("Step `I Login into Joomla administrator with username :arg1 and password :arg1` is not defined");
    }

    /**
     * @When I fill mandatory fields for creating menu
     */
    public function iFillMandatoryFieldsForCreatingMenu(TableNode $title)
    {
        $I = $this;

        $I->adminPage->clickToolbarButton('New');

        $totalRows = count($title->getRows());
        $lastIndex = ($totalRows - 1);

        // Iterate over all rows
        foreach ($title->getRows() as $index => $row)
        {
            if ($index !== 0)
            {
                $I->fillField(MenuItemManagerPage::$title, $row[0]);

                if ($index == $lastIndex)
                {
                    $I->adminPage->clickToolbarButton('Save');
                }
                else
                {
                    $I->adminPage->clickToolbarButton('Save & New');
                }
            }
        }
    }

    /**
     * @Then I should see the menu :arg1 is created
     */
    public function iShouldSeeTheMenuIsCreated($menu)
    {
        $I = $this;

        $I->MenuManagerPage->seeItemIsCreated($menu);
    }

    /**
     * @When I save the menu
     */
    public function iSaveTheMenu()
    {
        throw new \Codeception\Exception\Incomplete("Step `I save the menu` is not defined");
    }

    /**
     * @When I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see :arg1` is not defined");
    }

    /**
     * @Given I have a menu with title :arg1 which needs to be unpublish
     */
    public function iHaveAMenuWithTitleWhichNeedsToBeUnpublish($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I have a menu with title :arg1 which needs to be unpublish` is not defined");
    }

    /**
     * @When I unpublish the menu
     */
    public function iUnpublishTheMenu()
    {
        throw new \Codeception\Exception\Incomplete("Step `I unpublish the menu` is not defined");
    }

    /**
     * @Then I should see the menu is now unpublished
     */
    public function iShouldSeeTheMenuIsNowUnpublished()
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the menu is now unpublished` is not defined");
    }

    /**
     * @Given I have a menu with title :arg1 which needs to be trash
     */
    public function iHaveAMenuWithTitleWhichNeedsToBeTrash($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I have a menu with title :arg1 which needs to be trash` is not defined");
    }

    /**
     * @When I trash the menu
     */
    public function iTrashTheMenu()
    {
        throw new \Codeception\Exception\Incomplete("Step `I trash the menu` is not defined");
    }

    /**
     * @Then I should see the menu :arg1 in trash
     */
    public function iShouldSeeTheMenuInTrash($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the menu :arg1 in trash` is not defined");
    }

    /**
     * @When I create new menu without field title
     */
    public function iCreateNewMenuWithoutFieldTitle()
    {
        throw new \Codeception\Exception\Incomplete("Step `I create new menu without field title` is not defined");
    }

    /**
     * @When I set Type as :arg1
     */
    public function iSetTypeAs($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I set Type as :arg1` is not defined");
    }

    /**
     * @Given There is an menu item link
     */
    public function thereIsAnMenuItemLink()
    {
        throw new \Codeception\Exception\Incomplete("Step `There is an menu item link` is not defined");
    }

    /**
     * @When I check available tabs in menu item
     */
    public function iCheckAvailableTabsInMenuItem()
    {
        throw new \Codeception\Exception\Incomplete("Step `I check available tabs in menu item` is not defined");
    }

    /**
     * @When I fill mandatory fields for creating menu item
     */
    public function iFillMandatoryFieldsForCreatingMenuItem(TableNode $title)
    {
        throw new \Codeception\Exception\Incomplete("Step `I fill mandatory fields for creating menu item` is not defined");
    }

    /**
     * @Given I have a menu item with title :arg1 which needs to be unpublish
     */
    public function iHaveAMenuItemWithTitleWhichNeedsToBeUnpublish($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I have a menu item with title :arg1 which needs to be unpublish` is not defined");
    }

    /**
     * @When I unpublish the menu item
     */
    public function iUnpublishTheMenuItem()
    {
        throw new \Codeception\Exception\Incomplete("Step `I unpublish the menu item` is not defined");
    }

    /**
     * @Then I should see the menu item is now unpublished
     */
    public function iShouldSeeTheMenuItemIsNowUnpublished()
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the menu item is now unpublished` is not defined");
    }

    /**
     * @Given I have a menu item with title :arg1 which needs to be trash
     */
    public function iHaveAMenuItemWithTitleWhichNeedsToBeTrash($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I have a menu item with title :arg1 which needs to be trash` is not defined");
    }

    /**
     * @When I trash the menu item
     */
    public function iTrashTheMenuItem()
    {
        throw new \Codeception\Exception\Incomplete("Step `I trash the menu item` is not defined");
    }

    /**
     * @When I create new menu item without field title
     */
    public function iCreateNewMenuItemWithoutFieldTitle()
    {
        throw new \Codeception\Exception\Incomplete("Step `I create new menu item without field title` is not defined");
    }

    /**
     * @When I choose menu item type :arg1 and Menu :arg2
     */
    public function iChooseMenuItemTypeAndMenu($arg1, $arg2)
    {
        throw new \Codeception\Exception\Incomplete("Step `I choose menu item type :arg1 and Menu :arg2` is not defined");
    }

    /**
     * @When I set the menu as :arg1
     */
    public function iSetTheMenuAs($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I set the menu as :arg1` is not defined");
    }

    /**
     * @When I go to joomla home page
     */
    public function iGoToJoomlaHomePage()
    {
        throw new \Codeception\Exception\Incomplete("Step `I go to joomla home page` is not defined");
    }

    /**
     * @Then I should see the menu item language as :arg1
     */
    public function iShouldSeeTheMenuItemLanguageAs($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the menu item language as :arg1` is not defined");
    }

    /**
     * @When I search and select menu Item with title :arg1
     */
    public function iSearchAndSelectMenuItemWithTitle($title)
    {
        $I = $this;

        $I->menuItemManagerPage->haveItemUsingSearch($title);
        $I->adminPage->clickToolbarButton('edit');
    }
}