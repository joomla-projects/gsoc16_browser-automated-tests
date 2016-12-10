Feature: menu Item
  In order to manage menu item in the web
  As an owner
  I need to create modify trash publish and Unpublish menu item

  Background:
    When I Login into Joomla administrator with username "admin" and password "admin"
    And I see the administrator dashboard

  Scenario: Verify available tabs in Menu Items
    Given There is an menu item link
    When I check available tabs in menu item
    Then I see the available tabs "Details", "Link Type", "Page Display", "Metadata", "Module Assignment"

  Scenario: Create new menu item
    Given There is an menu item link
    When I fill mandatory fields for creating menu item
      |     Title      |
      |   MenuItem_1   |
    Then I should see the menu item "MenuItem_1" is created

  Scenario: Modify Menu Item
    Given There is an menu item link
    When I search and select menu Item with title "MenuItem_1"
    And I set the title as a "Modify_menuItem_1"
    And I save the menu item
    Then I should see the menu item "Modify_menuItem_1" is created

  Scenario: Unpublish menu item
    Given I have a menu item with title "Modify_menuItem_1" which needs to be unpublish
    When I unpublish the menu item
    Then I should see the menu item is now unpublished

  Scenario: Trash menu item
    Given I have a menu item with title "Modify_menuItem_1" which needs to be trash
    When I trash the menu item
    Then I should see the menu "Modify_menuItem_1" in trash

  Scenario: Create menu without Title fails
    Given There is an menu item link
    When I create new menu item without field title
    And I choose menu item type "Archived Articles" and Menu "Main Menu"
    And I save the menu item
    Then I should see the "Invalid field:  Title"

  Scenario: Create menu item for newly created menu
    Given There is an menu link
    When I fill mandatory fields for creating menu
      |     Title     |
      |     Menu_1    |
    Then I should see the menu "Menu" is created
    And I create menu item with title "menuItem_2"
    And I choose menu item type "Archived Articles" and Menu "Menu_1"
    And I save the menu item
    Then I should see the menu item "menuItem_1" is created

  Scenario: Change menu Item's Menu
    Given There is an menu item link
    When I search and select menu Item with title "menuItem_1"
    And I set the menu as "Main Menu"
    And I go to joomla home page
    Then I should see "menuItem_1"

  Scenario: Menu Language settings     // it should be of the menu item
    Given There is an menu item link
    When I search and select menu with title "menu_1"
    And I set language as a "English (en-GB)"
    And I save the menu item
    Then I should see the menu item language as "English (en-GB)"

