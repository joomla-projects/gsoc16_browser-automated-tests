Feature: menu
  In order to manage menu in the web
  As an owner
  I need to create modify trash publish and Unpublish menu

  Background:
    When I Login into Joomla administrator with username "admin" and password "admin"
    And I see the administrator dashboard

  Scenario: Verify available tabs in Menu
    Given There is an menu link
    When I check available tabs in menu
    Then I see available tabs "Menu Details", "Permissions"

  Scenario: Create new menu
    Given There is an menu link
    When I fill mandatory fields for creating menu
      |     Title     |
      |     Menu_1    |
    Then I should see the menu "Menu_1" is created

  Scenario: Modify Menu
    Given There is an menu link
    When I search and select menu with title "Menu_1"
    And I set the title as a "Modify_menu_1"
    And I save the menu
    Then I should see the menu "Modify_menu_1" is created

  Scenario: Unpublish menu
    Given I have a menu with title "Modify_menu_1" which needs to be unpublish
    When I unpublish the menu
    Then I should see the menu is now unpublished

  Scenario: Trash menu
    Given I have a menu with title "Modify_menu_1" which needs to be trash
    When I trash the menu
    Then I should see the menu "Modify_menu_1" in trash

  Scenario: Create menu without Title fails
    Given There is an menu link
    When I create new menu without field title
    And I set menu Type as "Menu Type"
    And I save the menu
    Then I should see the "Invalid field:  Title"
