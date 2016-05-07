Feature: Content
  In order to manage content articles in the web
  As an owner
  I need to be able to create and modify content articles

  Background:
    Given I am logged in at Joomla administrator as "admin" with password "admin"
    And I open administrator dashboard page

  Scenario: create featured content
    Given there is a content article with title "My first Joomla Content"
    When I feature the content with title "My first Joomla Content"
    Then I should see the published article "My first Joomla Content" in the joomla home page

  Scenario: Add New Article
    Given there is a content article with title "My first Joomla Article"
    When I feature the content with title "My first Joomla Article"
    Then I should see the published article "My first Joomla Article" in the joomla home page

  Scenario: Edit Article
    Given there is a list of  content article with title
    And I select the content article for edit with title "My first Joomla Article"
    When I feature the content with title "My first Joomla Article"
    Then I should see the published article "My first Joomla Article" in the joomla home page

  Scenario: Unpublish  Article
    Given there is a list of  content article with title
    And I select the content article for unpublish  with title "My first Joomla Article"
    When I unpublished the content with title "My first Joomla Article"
    Then I should not see the unpublished article "My first Joomla Article" in the joomla home page

  Scenario: publish  Article
    Given there is a list of  content article with title
    And I select the content article which is unpublish  with title "My first Joomla Article"
    When I published the content with title "My first Joomla Article"
    Then I should see the published article "My first Joomla Article" in the joomla home page

