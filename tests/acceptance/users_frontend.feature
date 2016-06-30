Feature: Users Frontend
  In order to manage users account in the web
  As a user
  I need to check user login and registration in joomla! CMS

  Background:
    Given Joomla CMS is installed
    Then I see the joomla! Home page

  Scenario: Create user from frontend (index.php?option=com_users)
    Given I click on the link "Create an account"
    And I create a user with fields Name "patel", Username "patel", Password "patel" and Email "patel@gmail.com"
    When I press the "Register"
    Then I see the warning and notice message
    But user is created

  Scenario: check the created user in the backend
    Given There is a user manager page in administrator
    When I search the user with user name "patel"
    Then I should see the user "prital"

  Scenario: Login with created user to assure it is blocked
    Given A newly created user "patel" with password "patel"
    When He press the "login"
    Then He should see the "Login denied! Your account has either been blocked or you have not activated it yet." warning

  Scenario: Check if block and activation are working
    Given There is a user manager page in administrator
    And I unblock the user "patel"
    And I active the user "patel"
    When A login user "patel" with password "patel"
    Then He should see the message "Hi patel,"

   Scenario: Change user details in the frontend, check in the backend
    Given I logged with user "patel"
     And I press the "Edit Profile"
     And I change name as a "patidar"
     When I press the "submit"
     Then Go to the user manager page in administrator
     And I search the user with name "patidar"
     And I sholud see the name "patidar"

  Scenario: Test last login date
    Given Needs to user "patel" logged in at least once
    When I login as a super admin from backend
    And Go to user manager page in administrator
    Then I search for "patel" username
    And I should see his last login date
