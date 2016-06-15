<?php
namespace Page\Acceptance\Joomla3\Administrator;

class LoginPage extends \AcceptanceTester
{
	public static $usernameField = ['id' => 'mod-login-username'];

	public static $passwordField = ['id' => 'mod-login-password'];

	public static $pageTitle = ['class' => 'page-title'];

	public static $loginButton = ['xpath' => "//button[contains(normalize-space(), 'Log in')]"];

	public static $pageURL = "/administrator/index.php";

	public static $controlPanelText = "Control Panel";
}
