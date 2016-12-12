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
 * Acceptance Page object class to define module manager page objects.
 *
 * @package  Page\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class ModuleManagerPage extends AdminPage
{
	/**
	 * Url to module manager page.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 */
	public static $url = "administrator/index.php?option=com_modules";

	/**
	 * Locator for model's name field
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $seeName = ['xpath' => "//table[@id='moduleList']//tr[1]/td[4]"];

	/**
	 * Page title of the module manager page.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 */
	public static $pageTitleText = "Modules (Site)";

	/**
	 * Locator for status filter under search tool
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $filterPublished = 'filter_state';

}
