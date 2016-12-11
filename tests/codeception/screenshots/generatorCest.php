<?php

define("JPATH_SCREENSHOTS", "../../../../screenshots/");


class generatorCest
{
	protected $urlConfig;

	public function _before(ScreenshotsTester $I)
	{
		$this->urlConfig = Symfony\Component\Yaml\Yaml::parse(file_get_contents('tests/codeception/screenshots/screenshot.urls.yml'));
	}

	public function _after(ScreenshotsTester $I)
	{
	}

	// tests
	public function installationScreenshots(ScreenshotsTester $I)
	{
		var_dump($this->urlConfig);
		var_dump($this->urlConfig['Administrator']['Article Manager (com_content)']);

		return;

		$I->comment('I open Joomla Installation Configuration Page');

		//$I->comment('creating screenshots folder at:' . JPATH_SCREENSHOTS . "installation");
		//mkdir(JPATH_SCREENSHOTS . "installation");

		$I->amOnPage('/installation/index.php');
		$I->makeScreenshot(JPATH_SCREENSHOTS . 'intallation-language');
		$I->installJoomlaRemovingInstallationFolder();
	}

	public function administratorScreenshots(ScreenshotsTester $I)
	{

		$I->amOnPage('administrator/');
		$I->makeScreenshot(JPATH_SCREENSHOTS . 'administrator Login');
		$I->doAdministratorLogin();

		return;

		$realPath = dirname(dirname(dirname(__DIR__))) . "/screenshots/";

		$I->comment($realPath);

		foreach ($pages as $url => $pageName) {
			$parts = explode("/", $pageName);

			if (count($parts) > 1) {
				$path = "";

				for ($i = 0; $i < count($parts) - 1; $i++) {
					$path .= $parts[$i] . "/";

					if (!is_dir($realPath . $path)) {
						mkdir($realPath . $path);
					}
				}
			}

			$I->amOnPage($url);
			$I->makeScreenshot(JPATH_SCREENSHOTS . $pageName);
		}
	}
}
