Feature: modules
  In order to manage modules in the web
  As an owner
  I need to create edit publish unpublish duplicate checkin trash restore module

  Background:
    When I Login into Joomla administrator
    And I see the administrator dashboard
    And I am in the module manager

  Scenario: Create a new module
    When I create new custom module
    And I Save the module
    Then I should see the success message
    And I should see the custom module is created

  Scenario: Edit module
   Given I have an module to edit
   And I edit the module title
   And I Save the module
   Then I should see the module is saved with the new title

  Scenario: Unpublish a module
    Given I have a custom module
    When I unpublish the custom module
    Then I should see the custom module is now unpublished

 Scenario: Publish a module
    Given I have a custom module
    When I publish the module
    Then I should see the custom module is now published

  Scenario: Duplicate a module
    Given I have a custom module
    When I duplicate the custom module
    Then I should see the duplicated module 

  Scenario: Check-in a module
    Given I have a custom module
    And the custom module is checked out
    When I check in the custom module
    Then I should see the custom module is now checked in
  
  Scenario: Trash a module
    Given I have a custom module
    When I trash the module
    Then I should see the module is now trashed

  Scenario: Publish a trashed module
    Given I have a trashed module
    When I publish the module
    Then I should see the trashed module is now published

  Scenario: Empty Trash
    Given I create new custom module
    And I Save the module
    When I trash the module
    And I empty trash
    Then I should see an empty trash
