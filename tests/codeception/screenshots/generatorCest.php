<?php


class generatorCest
{
    public function _before(ScreenshotsTester $I)
    {
    }

    public function _after(ScreenshotsTester $I)
    {
    }

    // tests
    public function installationScreenshots(ScreenshotsTester $I)
    {
        $I->comment('I open Joomla Installation Configuration Page');
        $I->amOnPage('/installation/index.php');
        $I->saveSessionSnapshot('Intallation Language');
   }
}
