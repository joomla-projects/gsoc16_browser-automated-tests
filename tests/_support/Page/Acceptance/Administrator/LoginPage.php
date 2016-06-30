<?php
namespace Page\Acceptance\Administrator;

use Page\Acceptance\Administrator\AdminPage;

class LoginPage extends AdminPage
{
    /**
     * @var   array  Locator for username login form textfield
     */
    public static $usernameField = ['css' => 'input[data-tests="username"]'];

    /**
     * @var   array  Locator for password login form textfield
     */
    public static $passwordField = ['css' => 'input[data-tests="password"]'];

    /**
     * @var   array  Locator for Log in button
     */
    public static $loginButton = ['css' => 'button[data-tests="log in"]'];
    
    public static $pageURL = "/administrator/index.php";
}