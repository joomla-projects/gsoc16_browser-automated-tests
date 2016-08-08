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
 * Acceptance Page object class to define Control Panel page objects.
 *
 * @package  Page\Acceptance\Administrator
 *
 * @since    3.7
 */
class ControlPanelPage extends AdminPage
{
	/**
	 * Link to the administrator control panel url.
	 *
	 * @var   string
	 * @since 3.7
	 */
	public static $url = "/administrator/index.php";

	/**
	 * Name of the text to identify the control panel.
	 *
	 * @var string
	 * @since 3.7
	 */
	public static $pageTitle = 'Control Panel';
}
