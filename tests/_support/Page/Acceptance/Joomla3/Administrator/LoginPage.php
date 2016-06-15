<?php
namespace Page\Acceptance\Joomla3\Administrator;

use Page\Acceptance\Joomla3\Administrator\AdminPage;

class LoginPage extends AdminPage
{
	public static $usernameField = ['id' => 'mod-login-username'];

	public static $passwordField = ['id' => 'mod-login-password'];

	public static $pageTitle = ['class' => 'page-title'];

	public static $loginButton = ['xpath' => "//button[contains(normalize-space(), 'Log in')]"];

	public static $pageURL = "/administrator/index.php";
}
