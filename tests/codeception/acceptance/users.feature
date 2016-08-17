Feature: users
  In order to manage users in the web
  As an owner
  I need to create edit block unblock and delete user

  Background:
    When I Login into Joomla administrator with username "admin" and password "admin"
    And I see the administrator dashboard

  Scenario: Verify available tabs in com_users
    Given There is an user link
    When I see the user edit view tabs
    Then I check available tabs "Account Details", "Assigned User Groups" and "Basic Settings"

  Scenario: Create a add new user
    Given There is a add user link
    When I create new user with fields Name "register", Login Name "register", Password "register" and Email "register@gmail.com"
    And I Save the user
    Then I should see the "User successfully saved." message

  Scenario: Edit user
    Given I search and select the user with user name "register"
    When I set name as an "Editor" and User Group as "Editor"
    And I Save the user
    Then I should see the "User successfully saved." message

  Scenario: Block a User
    Given I have a user with user name "register"
    When I block the user
    Then I should see the "User blocked." message

  Scenario: Unblock user
    Given I have a blocked user with user name "register"
    When I unblock the user
    Then I should see the "User enabled." message

  Scenario: Delete user
    Given I have a user with user name "Editor"
    When I Delete the user "Editor"
    Then I should see the "1 user successfully deleted." message

  Scenario: Create super admin and login into the backend
    Given There is a add user link
    And  I fill a super admin with fields Name "user1", Login Name "user1", Password "user1", and Email "user1@gmail.com"
    When I set assigned user group as an Administrator
    And I Save the user
    Then Login in backend with username "user1" and password "user1"

  Scenario: Create User without username fails
    Given There is a add user link
    When I don't fill Login Name but fulfill remaining mandatory fields: Name "user2", Password "user2" and Email "user2@gmail.com"
    And I Save the user
    Then I see the title "Users: New"
    But I see the alert error "Invalid field:  Login Name"

  Scenario: Create group
    Given There is a add new group link
    When I fill Group Title as a "Group1"
    And I save the Group
    Then I should see the "Group successfully saved." message

  Scenario: Edit group
    Given I search and select the Group with name "Group1"
    And I set group Title as a "Group2"
    When I save the Group
    Then I should see the "Group successfully saved." message

  Scenario: Delete Group
    Given I search and select the Group with name "Group2"
    When I Delete the Group "Group2"
    Then I should see the "1 User Group successfully deleted." message

  Scenario: Create ACL level
    Given There is a add viewing access level link
    When I fill Level Title as a "Acl1" and set Access as a public
    And I save the Access Level
    Then I should see the "Access level successfully saved." message

  Scenario: Edit ACL
    Given I search and select the Access Level with name "Acl1"
    And I set Access Level title as a "Acl2"
    When I save the Access Level
    Then I should see the "Access level successfully saved." message

  Scenario: Delete ACL
    Given I search and select the Access Level with name "Acl2"
    When I Delete the Access level "Acl2"
    Then I should see the "1 View Access Level successfully removed." message

  Scenario: User settings (Allow user registration)
    Given There is an user link
    And I goto the option setting
    When I set Allow User Registration as a yes
    And I save the setting
    Then I should be see the link Create an account in frontend
