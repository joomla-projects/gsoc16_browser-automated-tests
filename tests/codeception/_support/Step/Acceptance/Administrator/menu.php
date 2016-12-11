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
use Page\Acceptance\Administrator\MenuManagerPage;
use Behat\Gherkin\Node\TableNode;

/**
 * Acceptance Step object class contains suits for Menu Manager.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class Menu extends Admin
{
    /**
     * @Given There is an menu link
     */
    public function thereIsAnMenuLink()
    {
        $I = $this;

        $I->amOnPage(MenuManagerPage::$url);
        $I->adminPage->clickToolbarButton('New');
    }

    /**
     * @When I check available tabs in menu
     */
    public function iCheckAvailableTabsInMenu($tab1, $tab2)
    {
        $I = $this;

        $I->adminPage->clickToolbarButton('New');
        $I->waitForText('Articles: New Category');
    }

    /**
     * @Then I see available tabs :arg1, :arg2
     */
    public function iSeeAvailableTabs($tab1, $tab2)
    {
        $I = $this;

        $I->adminPage->verifyAvailableTabs([$tab1, $tab2]);        }

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
                $I->fillField(MenuManagerPage::$title, $row[0]);

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
    public function iShouldSeeTheMenuIsCreated($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the menu :arg1 is created` is not defined");
    }

    /**
     * @When I search and select menu with title :arg1
     */
    public function iSearchAndSelectMenuWithTitle($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I search and select menu with title :arg1` is not defined");
    }

    /**
     * @When I save the menu
     */
    public function iSaveTheMenu()
    {
        throw new \Codeception\Exception\Incomplete("Step `I save the menu` is not defined");
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
        $I = $this;
        $I->seeNumberOfElements(MenuItemManagerPage::$seeUnpublished, 1);
    }

    /**
     * @Given I have a menu with title :arg1 which needs to be trash
     */
    public function iHaveAMenuWithTitleWhichNeedsToBeTrash($title)
    {
        $this->menuManagerPage->haveItemUsingSearch($title);
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
        $I = $this;

        $I->amOnPage(MenuManagerPage::$url);
        $I->adminPage->clickToolbarButton('New');

        $I->waitForText('Menus: New Item');
        $I->adminPage->clickToolbarButton('Save');
    }

    /**
     * @Then I choose menu item type :arg1 and Menu :arg2
     */
    public function iChooseMenuItemTypeAndMenu($arg1, $arg2)
    {
        throw new \Codeception\Exception\Incomplete("Step `I choose menu item type :arg1 and Menu :arg2` is not defined");
    }

    /**
     * @Then I should see the menu language as :arg1
     */
    public function iShouldSeeTheMenuLanguageAs($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I should see the menu language as :arg1` is not defined");
    }

    /**
     * @When I set menu Type as :arg1
     */
    public function iSetMenuTypeAs($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I set menu Type as :arg1` is not defined");
    }
}