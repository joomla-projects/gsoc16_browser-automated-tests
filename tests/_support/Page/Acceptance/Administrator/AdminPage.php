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
 * Acceptance Page object class to define administrator page objects.
 *
 * @package  Page\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class AdminPage extends \AcceptanceTester
{
	/**
	 * The element id which contains system messages.
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $systemMessageContainer = ['id' => 'system-message-container'];

	/**
	 * The element id which contains page title in administrator header.
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $pageTitle = ['class' => 'page-title'];

	/**
	 * Locator for user's search input field
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $filterSearch = ['id' => 'filter_search'];

	/**
	 * Locator for user's search button icon
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $iconSearch = ['class' => 'icon-search'];

	/**
	 * Method to search using user's name
	 *
	 * @param   string  $keyword  The keyword to search
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function search($keyword)
	{
		$I = $this;

		$I->fillField(static::$filterSearch, $keyword);
		$I->click(static::$iconSearch);
	}

	/**
	 * Method to search user with username
	 *
	 * @param   string  $keyword  The username of user
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void  Checkbox for given username will be checked.
	 */
	public function haveItemUsingSearch($keyword)
	{
		$I = $this;

		$I->amOnPage(static::$url);
		$I->search($keyword);
		$I->checkAllResults();
	}

	/**
	 * Method is used to see system message after waiting for page title.
	 *
	 * @param   string  $title    The webpage title
	 * @param   string  $message  The unpublish successful message
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function seeSystemMessage($title, $message)
	{
		$I = $this;

		$I->waitForPageTitle($title);
		$I->see($message, self::$systemMessageContainer);
	}
}
