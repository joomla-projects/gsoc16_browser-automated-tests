Feature: users_frontend
  In order to manage users account in the web
  As a user
  I need to check user login and registration in joomla! CMS

  Background:
    Given Joomla CMS is installed
    Then I see the joomla! Home page

  Scenario: Create user and login in the frontend (index.php?option=com_users)
    Given I login with username "prital" and password "prital"
    When I press the login button
    Then I should see the "Hi prital," on joomla frontpage

  Scenario: Create blocked user and try to login in the frontend
    Given I create a user with fields Name "patel", Login Name "patel", Password "patel" and Email "patel@gmail.com"
    And I block the user "patel"
    When I login with username "patel" and password "patel"
    And I press the login button
    Then I should see the warning "Login denied! Your account has either been blocked or you have not activated it yet"

  Scenario: Test last login date


  Scenario: Register a new user in the frontend and check it in the backend
    Given I click on the link "Create an account"
    And I create a user with fields Name "patel", Login Name "patel", Password "patel" and Email "patel@gmail.com"


  Scenario: Check if block and activation are working
    Given I unblock the user "patel"
    When I login with username "patel" and password "patel"
    Then I should see the message "Hi patel,"

  Scenario: Change details in the frontend, check in the backend
