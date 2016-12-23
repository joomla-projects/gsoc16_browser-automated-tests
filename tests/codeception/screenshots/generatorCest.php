<?php

define("JPATH_SCREENSHOTS", "../../../../screenshots/");


class generatorCest
{
	protected $urlConfig;

	protected $adminSuites;

	protected $frontendAdminSuites;

	protected $frontendSuites;

	protected $baseDir;

	public function _before(ScreenshotsTester $I)
	{
		$this->baseDir = dirname(dirname(dirname(__DIR__)));

		$this->urlConfig = Symfony\Component\Yaml\Yaml::parse(file_get_contents('tests/codeception/screenshots/screenshot.urls.yml'));

		// @todo improve
		$this->adminSuites = $this->urlConfig['Administrator Backend'];
		$this->frontendAdminSuites = $this->urlConfig['Administrator Frontend'];
		$this->frontendSuites = $this->urlConfig['Guest'];

		$this->version = $this->urlConfig['Version'];
	}

	public function _after(ScreenshotsTester $I)
	{
	}

	// tests
	/**
	 * Screenshots of the installation
	 *
	 * @param ScreenshotsTester $I
	 */
	public function installationScreenshots(ScreenshotsTester $I)
	{
		$I->comment('I open Joomla Installation Configuration Page');

		$I->installJoomlaRemovingInstallationFolder();
	}

	/**
	 * Screenshots of the admin area
	 *
	 * @param ScreenshotsTester $I
	 */
	public function administratorScreenshots(ScreenshotsTester $I)
	{
		$I->amOnPage('administrator/');
		$I->doAdministratorLogin();

		// @todo Improve
		$target = $this->baseDir . "/screenshots/administrator";

		$this->makeScreenshots($I, $this->adminSuites, $target);
	}

	/**
	 * Screenshots of the frontend as logged in admin
	 *
	 * @param ScreenshotsTester $I
	 */
	public function frontendAdministratorScreenshots(ScreenshotsTester $I)
	{
		$I->amOnPage('index.php');
		$I->doFrontEndLogin();

		$target = $this->baseDir . "/screenshots/frontendadmin";

		$this->makeScreenshots($I, $this->frontendAdminSuites, $target);
	}

	/**
	 * Frontend Scrreenshots as guest
	 *
	 * @param ScreenshotsTester $I
	 */
	public function frontendScreenshots(ScreenshotsTester $I)
	{
		$I->amOnPage('index.php');

		$target = $this->baseDir . "/screenshots/frontend";

		$this->makeScreenshots($I, $this->frontendSuites, $target);
	}

	/**
	 * Create screenshots
	 *
	 * @param $I
	 * @param $suites
	 * @param $target
	 */
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
