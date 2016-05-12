<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given Joomla CMS is installed
     */
    public function joomlaCMSIsInstalled()
    {
        // throw new \Codeception\Exception\Incomplete("Step `Joomla CMS is installed` is not defined");
    }

    /**
     * @When Login into Joomla administrator with username :arg1 and password :arg1
     */
    public function loginIntoJoomlaAdministratorWithUsernameAndPassword($username, $password)
    {
        $I = $this;
        $I->amOnPage('administrator/');
        $I->fillField('Username', $username);
        $I->fillField(['id' => 'mod-login-password'], $password);
        $I->click('Log in');
    }

    /**
     * @Then I see administrator dashboard
     */
    public function iSeeAdministratorDashboard()
    {
        // throw new \Codeception\Exception\Incomplete("Step `I see administrator dashboard` is not defined");
    }
}
