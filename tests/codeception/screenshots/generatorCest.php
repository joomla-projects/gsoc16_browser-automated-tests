<?php

define("JPATH_SCREENSHOTS", "../../../../screenshots/");


/**
 * Simple test runner for screenshots for the marketing team
 */
class generatorCest
{
	protected $urlConfig;

	protected $adminSuites;

	protected $frontendAdminSuites;

	protected $frontendSuites;

	protected $baseDir;

	public function _before(ScreenshotsTester $I)
	{
		$this->baseDir = dirname(dirname(dirname(__DIR__))) . '/screenshots/';

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

	/**
	 * Screenshots of the installation
	 *
	 * @param ScreenshotsTester $I
	 */
	public function installationScreenshots(ScreenshotsTester $I)
	{
		$I->comment('I open Joomla Installation Configuration Page');

		// Comment these lines for not DOING THE INSTALLATION
		/*$I->installJoomlaRemovingInstallationFolder();
		$I->doAdministratorLogin();
		$I->disableStatistics();*/
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
		$target = $this->baseDir . 'administrator/';

		$this->makeScreenshots($I, $this->adminSuites, $target, 'administrator/');
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

		$target = $this->baseDir . 'frontendAdmin/';

		$this->makeScreenshots($I, $this->frontendAdminSuites, $target, 'frontendAdmin/');
	}

	/**
	 * Frontend Screenshots as guest
	 *
	 * @param ScreenshotsTester $I
	 */
	public function frontendScreenshots(ScreenshotsTester $I)
	{
		$I->amOnPage('index.php');

		$target = $this->baseDir . 'frontend/';

		$this->makeScreenshots($I, $this->frontendSuites, $target, 'frontend/');
	}

	/**
	 * Create screenshots
	 *
	 * @param $I
	 * @param $suites
	 * @param $target
	 */
	protected function makeScreenshots($I, $suites, $target, $base = '')
	{
		foreach ($suites as $suite)
		{
			$folder = $suite['folder'];
			$urls   = $suite['screenshots'];

			$outputFolder = $target . $folder;

			if (!is_dir($outputFolder))
			{
				mkdir($outputFolder, 0777, true);
			}

			$I->comment('Write something in the terminal ' + print_r($urls, true));
			foreach ($urls as $url => $fileName)
			{
				$I->comment('URL ' . $url);
				$I->comment('Filename ' . $fileName);
				parse_str(parse_url($url, PHP_URL_QUERY), $params);
				$frag = parse_url($url, PHP_URL_FRAGMENT);
				$I->comment($frag);
				if(isset($params))
				{
					if(isset($params['extension'])) //Case for the Extension Presence
					{
						$extens = explode("_",$params['extension']);
						$I->comment('Extension' . $extens[1]);
						$imagename = ucfirst($extens[1]);

						if($params['option'])
						{
							$part = explode("_",$params['option']); //Splting com_componentname
							$part = $imagename . '-' . ucfirst($part[1]); // Selecting and Making it to Upper case
							$imagename =  $part;
							// $I->comment($imagename);

							$I->comment($params['option']);
						}
						if(isset($params['view'])) // Fetching the View Parameter
						{
							$imagename = $imagename . '-' . ucfirst($params['view']);
						}
						if(isset($params['layout'])) // Fetching the Layout Paramtere
						{
							$imagename = $imagename . '-' . ucfirst($params['layout']);
						}

						if(isset($frag))
						{
							$imagename = $imagename . '-' . $fileName . '-Tab';
							$I->comment('Fragment File Name' . $imagename);
						}


					}
					else{ //Simple case

						if($params['option'])
						{
							if(strcmp($params['option'], 'com_contact') == 0){ //Contact component case
								$imagename =  'Contacts';

							}
							else{
								$part = explode("_",$params['option']); //Splting com_componentname
								$part = ucfirst($part[1]); // Selecting and Making it to Upper case
								$imagename =  $part;
								// $I->comment($imagename);
								$I->comment($params['option']);
							}
						}
						if(isset($params['view'])) // Fetching the View Parameter
						{
							$imagename = $imagename . '-' . ucfirst($params['view']);
						}
						if(isset($params['context'])) // Fetching the Context Parameter
						{
							$imagename = $imagename . '-' . ucfirst(explode(".",$params['context'])[1]);
						}
						if(isset($params['layout'])) // Fetching the Layout Paramtere
						{
							$imagename = $imagename . '-' . ucfirst($params['layout']);
						}

						if(isset($frag))
						{
							// 	$dom = new DOMDocument();
							// 	$dom->loadHTML($html);
							// 	$urls = $dom->getElementsByTagName('a');

							// 	foreach ($urls as $url)
							// 	{
							// 		$attributes = $url->attributes;
							// 		echo"$url->nodeValue";
							// 	}
							// 	// preg_match('~>\K[^<>]*(?=<)~', $frag, $match)
							// 	$I->grabTextFrom(['id' => $frag]);
							// 	echo "<script type = \"text/javascript\">
							// 	$(document).ready(function() {
							// 	var texts = document.getElementByhref(\"$frag\");
							// 	alert(texts.innerHTML);
							// });
							// </script>";
							// $I->comment('Fragemt' . $texts);
							// $I->comment('Fragment Tab' . $text);
							$imagename = $imagename . '-' . $fileName . '-Tab';
							$I->comment('Fragment File Name' . $imagename);
						}

					}
					$imagename = 'Help4x-Components-' . $imagename . '-en';// Preparing image name.
					$I->comment('Final ' . $imagename);


				}
				$parts = explode("/", $fileName);

				if (!is_dir($outputFolder))
				{
					mkdir($outputFolder, 0777, true);
				}

				// @todo Get the filename and add Help-3x (whatever) to it
				// because we currently filename is edit/filename


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

				// Tab support
				$tabs = explode('#', $url);

				if (count($tabs) > 1)
				{
					$tab = $tabs[count($tabs) - 1];

					$I->comment('Selecting tab ' . $tab);

					$I->wait(1);
					$I->click('a[href="#' . $tab . '"]');
				}
				// @todo improve
				$I->makeScreenshot(JPATH_SCREENSHOTS . $base . $folder . $imagename);
			}
		}
	}
}
