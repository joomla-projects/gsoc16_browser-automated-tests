Feature: administrator
  In order to manage my web application
  As an administrator
  I need to have a control panel

  Scenario: Feature an Article
    Given Joomla CMS is installed
    When Login into Joomla administrator with username "admin" and password "admin"
    Then I see administrator dashboard
