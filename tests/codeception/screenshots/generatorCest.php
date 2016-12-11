<?php

define("JPATH_SCREENSHOTS", "../../../../screenshots/");


class generatorCest
{
	protected $urlConfig;

	protected $adminSuites;

	protected $adminFrontendSuites;

	protected $frontendSuites;

	public function _before(ScreenshotsTester $I)
	{
		$this->urlConfig = Symfony\Component\Yaml\Yaml::parse(file_get_contents('tests/codeception/screenshots/screenshot.urls.yml'));

		// @todo improve
		$this->adminSuites = $this->urlConfig['Administrator Backend'];
		$this->adminFrontendSuites = $this->urlConfig['Administrator Frontend'];
		$this->frontendSuites = $this->urlConfig['Guest'];
	}

	public function _after(ScreenshotsTester $I)
	{
	}

	// tests
	public function installationScreenshots(ScreenshotsTester $I)
	{
		$I->comment('I open Joomla Installation Configuration Page');

		$I->installJoomlaRemovingInstallationFolder();
	}

	public function administratorScreenshots(ScreenshotsTester $I)
	{
		$I->amOnPage('administrator/');
		$I->doAdministratorLogin();

		// @todo Improve
		$target = dirname(dirname(dirname(__DIR__))) . "/screenshots/";

		$this->makeScreenshots($I, $this->adminSuites, $target);
	}

	protected function makeScreenshots($I, $suites, $target)
	{
		foreach ($suites as $suite)
		{
			$folder = $suite['folder'];
			$urls   = $suite['screenshots'];

			$outputFolder = $target . $folder;

			$I->comment('Output ' . $outputFolder);

			if (!is_dir($outputFolder))
			{
				mkdir($outputFolder, 0777, true);
			}

			foreach ($urls as $url => $fileName)
			{
				$I->comment('URL ' . $url);
				$I->comment('Filename ' . $fileName);

				$parts = explode("/", $fileName);

				if (!is_dir($outputFolder))
				{
					mkdir($outputFolder, 0777, true);
				}

				// @todo improve
				if (count($parts) > 1)
				{
					array_pop($parts);

					$path = implode('/', $parts);

					if (!is_dir($outputFolder . $path))
					{
						mkdir($outputFolder . $path, 0777, true);
					}
				}

				$I->amOnPage($url);

				// @todo improve
				$I->makeScreenshot(JPATH_SCREENSHOTS . $folder . $fileName);
			}
		}
	}
}
