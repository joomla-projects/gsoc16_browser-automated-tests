Feature: users
  In order to manage users in the web
  As an owner
  I need to create edit block unblock and delete user

  Background:
    Given Joomla CMS is installed
    When Login into Joomla administrator with username "admin" and password "admin"
    Then I see administrator dashboard

  Scenario: create a user
    Given There is a add user link
    When I enter the Name "register"
    And I enter the Login Name "register"
    And I enter the Password "register"
    And I enter the Confirm Password "register"
    And I enter the Email "bladhapiyu@gmail.com"
    Then I Save the  user
    And I see the "User successfully saved." message

  Scenario: Edit user
    Given I search and select the user with user name "register"
    When I set name as an "Editor" and User Group as "Editor"
    Then I Save the  user
    And I see the "User successfully saved." message

  Scenario: Block a User
    Given I have a user with user name "register"
    When I block the user
    Then I should see the user block message "User blocked."

  Scenario: Unblock user
    Given I have a blocked user with user name "register"
    When I unblock the user
    Then I should see the user unblock message "User enabled."

  Scenario: Delete user
    Given I have a user with user name "Editor"
    When I Delete the user "Editor"
    Then I confirm the user should have been deleted by getting the message "1 user successfully deleted."







