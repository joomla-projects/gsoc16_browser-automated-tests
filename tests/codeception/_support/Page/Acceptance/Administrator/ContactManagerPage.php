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
 * Acceptance Page object class to define Contact Manager page objects.
 *
 * @package  Page\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class ContactManagerPage extends AdminPage
{
	/**
	 * Link to the contact listing page.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 */
	public static $url = "/administrator/index.php?option=com_contact";

	/**
	 * Link to the contact listing page.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 */
	public static $contactTitle = "Contacts";

	/**
	 * Locator for contact's name field
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $seeName = ['xpath' => "//table[@id='contactList']//tr[1]//td[4]"];

	/**
	 * Locator for contact's unfeatured icon
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $seeUnfeatured = ['xpath' => "//table[@id='contactList']//*//span[@class='icon-unfeatured']"];

	/**
	 * Locator for contact's access level field
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $seeAccessLevel = ['xpath' => "//table[@id='contactList']//tr[1]//td[6]"];

	/**
	 * Locator for contact's unpublish icon
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $seeUnpublished = ['xpath' => "//table[@id='contactList']//*//span[@class='icon-unpublish']"];

	/**
	 * Method to create new contact
	 *
	 * @param   string $name    The contact name
	 *
	 * @When    I create new contact with field name as :name
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function fillContactCreateForm($name)
	{
		$I = $this;

		$I->fillField(self::$name, $name);
	}
}
