<?php
/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Page
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Page\Acceptance\Administrator;

/**
 * Acceptance Page object class to define menu manager page objects.
 *
 * @package  Page\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class MenuItemManagerPage extends AdminPage
{
    /**
     * Link to the article category listing url.
     *
     * @var    string
     * @since  __DEPLOY_VERSION__
     */
    public static $url = 'administrator/index.php?option=com_menus&view=items';

    /**
     * Locator for invalid category alert
     *
     * @var    array
     * @since  __DEPLOY_VERSION__
     */
    public static $invalidTitle = ['class' => 'alert-error'];

    /**
     * Locator for Menu Item unpublished icon
     *
     * @var    array
     * @since  __DEPLOY_VERSION__
     */
    public static $seeUnpublished = ['xpath' => "//table[@id='itemList']//*//span[@class='icon-unpublish']"];

    /**
     * Locator for menu Item language field
     *
     * @var    array
     * @since  __DEPLOY_VERSION__
     */
    public static $seeLanguage = ['xpath' => "//table[@id='itemList']//tr[1]//td[10]"];

    public function selectMenuItemType($menuCategory, $menuItem)
    {


        // Open the category
        $I->wait(1);
        $I->waitForElement(['link' => $menuCategory], '60');
        $I->click(['link' => $menuCategory]);

        $I->comment("Choose the menu item type: $menuItem");
        $I->wait(1);
        $I->waitForElement(['xpath' => "//a[contains(text()[normalize-space()], '$menuItem')]"], '60');
        $I->click(['xpath' => "//div[@id='collapseTypes']//a[contains(text()[normalize-space()], '$menuItem')]"]);
        $I->comment('I switch back to the main window');
    }

    public function selectTypeAndMenu($type, $menu){

        $I = $this;

        $I->comment("Open the menu types iframe");
        $I->click(['link' => "Select"]);
        $I->waitForElement(['id' => 'menuTypeModal'], '60');
        $I->wait(1);
        $I->switchToIFrame("Menu Item Type");

        $I->comment("Open the menu category: $type");


    }
}