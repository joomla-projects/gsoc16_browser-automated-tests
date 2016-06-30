<?php
namespace Step\Acceptance\Installation;

use Page\Acceptance\Administrator\LoginPage;
use Page\Acceptance\Administrator\ControlPanelPage;

class Installation extends \AcceptanceTester
{
	/**
	 * @Given Joomla CMS is installed
	 */
	public function joomlaCMSIsInstalled()
	{
		$I = $this;
		// @todo: the following path should be taken from configuration and not hardcoded as it is now.
		$I->assertFileExists('tests/joomla-cms3/configuration.php');
	}
}