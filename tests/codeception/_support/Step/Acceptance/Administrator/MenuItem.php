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
use Page\Acceptance\Site\FrontPage;

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
     * @When I check available tabs in menu item
     */
    public function iCheckAvailableTabsInMenuItem()
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
     * @When I fill mandatory fields for creating menu item
     */
    public function iFillMandatoryFieldsForCreatingMenuItem(TableNode $title)
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

        $I->menuManagerPage->seeItemIsCreated($menu);
    }

    /**
     * @When I save the menu
     */
    public function iSaveTheMenu()
    {
        $I = $this;

        $I->adminPage->waitForPageTitle('Menus: Add');
        $I->adminPage->clickToolbarButton('save & close');
    }

    /**
     * @When I should see :arg1
     */
    public function iShouldSee($menuItem)
    {
        $I = $this;

        $I->menuItemManagerPage->seeItemIsCreated($menuItem);
    }

    /**
     * @When I should see error :arg1
     */
    public function iShouldSeeError($error)
    {
        $I = $this;

        $I->see($error, MenuItemManagerPage::$invalidTitle);
    }

    /**
     * @Given I have a menu with title :arg1 which needs to be unpublished
     */
    public function iHaveAMenuWithTitleWhichNeedsToBeUnpublished($title)
    {
        $this->categoryManagerPage->haveItemUsingSearch($title);
    }

    /**
     * @When I unpublish the menu
     */
    public function iUnpublishTheMenu()
    {
        $I = $this;

        $I->adminPage->clickToolbarButton('unpublish');
    }

    /**
     * @When I trash the menu
     */
    public function iTrashTheMenu()
    {
        $I = $this;

        $I->adminPage->clickToolbarButton('trash');
    }

    /**
     * @Then I should see the menu :arg1 in trash
     */
    public function iShouldSeeTheMenuInTrash($title)
    {
        $I = $this;

        $I->menuManagerPage->seeItemInTrash($title, 'Articles: Categories');
    }

    /**
     * @Given There is an menu item link
     */
    public function thereIsAnMenuItemLink()
    {
        $I = $this;

        $I->amOnPage(MenuItemManagerPage::$url);
        $I->adminPage->clickToolbarButton('New');
    }

    /**
     * @Given I have a menu item with title :arg1 which needs to be unpublished
     */
    public function iHaveAMenuItemWithTitleWhichNeedsToBeUnpublished($title)
    {
        $this->menuItemManagerPage->haveItemUsingSearch($title);
    }

    /**
     * @When I unpublish the menu item
     */
    public function iUnpublishTheMenuItem()
    {
        $I = $this;

        $I->adminPage->clickToolbarButton('unpublish');
    }

    /**
     * @Then I should see the menu item is now unpublished
     */
    public function iShouldSeeTheMenuItemIsNowUnpublished()
    {
        $I = $this;

        $I->seeNumberOfElements(MenuItemManagerPage::$seeUnpublished, 1);
    }

    /**
     * @Given I have a menu item with title :arg1 which needs to be trash
     */
    public function iHaveAMenuItemWithTitleWhichNeedsToBeTrash($title)
    {
        $this->menuItemManagerPage->haveItemUsingSearch($title);    }

    /**
     * @When I trash the menu item
     */
    public function iTrashTheMenuItem($title)
    {
        $this->menuItemManagerPage->haveItemUsingSearch($title);
    }

    /**
     * @When I create new menu item without field title
     */
    public function iCreateNewMenuItemWithoutFieldTitle()
    {
        $I = $this;

        $I->amOnPage(MenuItemManagerPage::$url);
        $I->adminPage->clickToolbarButton('New');

        $I->waitForText('Menus: New Item');
        $I->adminPage->clickToolbarButton('Save');
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
        $I = $this;

        $I->amOnPage(FrontPage::$url);
    }

    /**
     * @Then I should see the menu item language as :arg1
     */
    public function iShouldSeeTheMenuItemLanguageAs($title)
    {
        $I = $this;

        $I->amOnPage(MenuItemManagerPage::$url);
        $I->see($title, MenuItemManagerPage::$seeLanguage);
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