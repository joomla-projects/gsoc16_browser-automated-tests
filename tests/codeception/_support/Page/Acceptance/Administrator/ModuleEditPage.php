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
 * Acceptance Page object class to define module edit page objects.
 *
 * @package  Page\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class ModuleEditPage extends AdminPage
{
	/**
	 * Url to module edit page.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 */
	public static $url = "administrator/index.php?option=com_modules&view=module&layout=edit";

	/**
	 * Page title of the module edit page.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 */
	public static $pageTitleText = "Modules: Custom";
	
	/**
	 * Field: Module title of the module edit page.
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $titleField = ['id' => 'jform_title'];

	/**
	 * Page object for content body editor field for module edit.
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	public static $contentField = ['id' => 'jform_content'];

	/**
	 * Page object for the toggle button.
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__
	 * @todo move this into admin page
	 */
	public static $toggleEditor = "Toggle editor";

	/**
	 * Method is a page object to fill module title.
	 *
	 * @param   string  $title      Module title
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void 
	 */
	public function fillModuleTitle($title)
	{
		$I = $this;

		$I->fillField(self::$titleField, $title);
	}	

	/**
	 * Method is a page object to fill module content.
	 *
	 * @param   string  $content      Module content
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void 
	 */
	public function fillModuleContent($content)
	{
		$I = $this;
		$I->click(self::$toggleEditor);
		$I->fillField(self::$contentField, $content);
	}	

}
