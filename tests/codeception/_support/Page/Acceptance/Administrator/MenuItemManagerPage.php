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

}