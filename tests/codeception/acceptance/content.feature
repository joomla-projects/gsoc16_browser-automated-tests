Feature: content
  In order to manage content article in the web
  As an owner
  I need to create modify trash publish and Unpublish content article

  Background:
    When I Login into Joomla administrator with username "admin" and password "admin"
    And I see the administrator dashboard

  Scenario: Create an Article
    Given There is a add content link
    When I create new content with field title as "Article One" and content as a "This is my first article"
    And I save an article
    Then I should see the "Article successfully saved." message

  Scenario: Feature an Article
    Given I search and select content article with title "Article One"
    When I featured the article
    Then I should see the "1 article featured." message

  Scenario: Modify an article
    Given I select the content article with title "Article One"
    When I set access level as a "Registered"
    And I save the article
    Then I should see the "Article successfully saved." message

  Scenario: Unpublish an article
    Given I have article with name "Article One"
    When I unpublish the article
    Then I should see the "1 article unpublished." message

  Scenario: Trash an article
    Given I have "Article One" content article which needs to be Trash
    When  I Trash the article
    Then  I should see the "1 article trashed." message
