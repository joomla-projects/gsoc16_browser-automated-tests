Feature: content
  In order to manage content article in the web
  As an owner
  I need to create modify delete and Unpublish content article

  Background:
    Given There is an administrator link
    When Login into Joomla administrator with username "admin" and password "admin"
    Then I see administrator dashboard

  Scenario: Create an Article
    Given There is a Add Content link
    When I add the content with title "My_Article"
    And I add content body "This is my first article"
    And I save an article
    Then I should see the article "My_Article" in the joomla frontend

  Scenario: Feature an Article
    Given there is a content article with title "My_Article"
    When I feature the content with title "My_Article"
    Then I should see the published article "My_Article" in the joomla home page

  Scenario: Modify an article
    Given I select the content article with title "My first Joomla Article"
    And change the title "My Joomla Article"
    When I try to post "My Joomla Article"
    Then I should see the "Article successfully saved"
    And published article "My Joomla Article" in the joomla home page

  Scenario: Unpublish an article
    Given I have article with name "My Joomla Article"
    When I un publish "My Joomla Article"
    Then I can not see the article "My Joomla Article" in the joomla home page

  Scenario: Remove an article
    Given I have one content article which needs to be removed
    When  I delete the article with name "My Joomla Article"
    Then I should not see in joomla site frontend

  Scenario: Registered user can not see or access article from site
    Given I have article with title "My Joomla Article"
    And  set access to registered
    When I do login with registered user "prital" and password "patel"
    Then I should see the registered article in the joomla home page
