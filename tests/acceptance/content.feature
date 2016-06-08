Feature: content
  In order to manage content article in the web
  As an owner
  I need to create content article

  Background:
    Given Joomla CMS is installed
    When Login into Joomla administrator with username "puneet" and password "1234"
    Then I see administrator dashboard

  Scenario: Create an Article
    Given There is a Add Content link
    When I fill mandatory fields for creating article
      | field   | value                    |
      | title   | My_Article               |
      | content | This is my First Article |
    And I save an article
    Then I should see the "Article successfully saved." message
