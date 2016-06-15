<?php
namespace Page\Acceptance\Joomla3\Administrator;

use Page\Acceptance\Joomla3\Administrator\AdminPage;

class ArticleManagerPage extends AdminPage
{
	public static $articleTitleField = ['id' => 'jform_title'];

	public static $articleContentField = ['id' => 'jform_articletext'];

	public static $toggleEditor = "Toggle editor";

	public static $pageURL = "/administrator/index.php?option=com_content&view=articles";
}
