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
        $I->waitForText('Menus: Add');
    }

    /**
     * @Then I see available tabs :arg1, :arg2
     */
    public function iSeeAvailableTabs($tab1, $tab2)
    {
        $I = $this;

        $I->adminPage->verifyAvailableTabs([$tab1, $tab2]);
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
    public function iShouldSeeTheMenuIsCreated($menu)
    {
        $I = $this;

        $I->menuManagerPage->seeItemIsCreated($menu);
    }

    /**
     * @When I search and select menu with title :arg1
     */
    public function iSearchAndSelectMenuWithTitle($title)
    {
        $I = $this;

        $I->menuManagerPage->haveItemUsingSearch($title);
        $I->adminPage->clickToolbarButton('edit');
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
        $I = $this;

        $I->adminPage->clickToolbarButton('trash');
    }

    /**
     * @Then I should see the menu :arg1 in trash
     */
    public function iShouldSeeTheMenuInTrash($title)
    {
        $I = $this;

        $I->menuManagerPage->seeItemInTrash($title, 'Menus');
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
     * @When I set menu Type as :arg1
     */
    public function iSetMenuTypeAs($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `I set menu Type as :arg1` is not defined");
    }
}