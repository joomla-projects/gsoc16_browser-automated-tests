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
 * Acceptance Page object class to define category manager page objects.
 *
 * @package  Page\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class CategoryManagerPage extends AdminPage
{
	/**
	 * Link to the article category listing url.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 */
	public static $url = '/administrator/index.php?option=com_categories&view=categories&extension=com_content';

	/**
	 * Locator for category name field
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $name = ['id' => 'jform_title'];

	/**
	 * Locator for category search field
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $filterSearch = ['id' => 'filter_search'];

	/**
	 * Locator for category search button
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $iconSearch = ['class' => 'icon-search'];

	/**
	 * Locator for invalid category alert
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $invalidTitle = ['class' => 'alert-error'];

	/**
	 * Method check category with given title to prepare action on it.
	 *
	 * @param   string  $title  The category title
	 *
	 * @Given I have a category with title :arg1 which needs to be trash
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function haveCategoryWithTitle($title)
	{
		$I = $this;

		$I->amOnPage(self::$url);
		$I->fillField(self::$filterSearch, $title);
		$I->click(self::$iconSearch);
		$I->checkAllResults();
	}
}
