Feature: contact
  In order to manage contacts in the web
  As an owner
  I need to create modify trash publish and Unpublish contacts

  Background:
    When I Login into Joomla administrator
    And I see the administrator dashboard

  Scenario: Create an contact
    Given There is a add contact link
    When I create new contact with field name as "Contact One"
    And I save the contact "Contact One"
    Then I should see the contact "Contact One" is created

  Scenario: Modify an contact
    Given I select the contact with the name "Contact One"
    When I change access level as a "Registered"
    And I save the contact "Contact One"
    Then I should see the "Registered" as contact access level

  Scenario: Featured an contact
    Given I have "Contact One" contact which will be featured
    When I feature the contact
    Then I should see the contact is now featured

  Scenario: Unpublish an contact
    Given I have contact with name "Contact One"
    When I unpublish the contact
    Then I should see the contact is now unpublished

  Scenario: Trash an contact
    Given I have "Contact One" contact which is need to be Trashed
    When  I Trash the contact
    Then  I should see the contact "Contact One" in trash

  Scenario: Remove contact from trash
    Given I have "Contact One" contact which is Trashed
    When  I empty the trash
    Then  I should not see the contact "Contact One" in trash
