Hacer un Domain Language

Feature: content
  In order to manage content article in the web
  As an owner
  I need to create modify trash publish and Unpublish content article

  Background:
    When I Login into Joomla administrator with username "admin" and password "admin"
    And I see the administrator dashboard

  Scenario: add article menu item exists in dashboard
    Given I am at Administrator Dashboard
    When I navigate to the "Add New Article" menu item
    Then I am redirected to "Create New Article" Page

  Scenario: add category menu item exists in dashboard
    Given I am at Administrator Dashboard
    When I navigate to the "Add New Article" menu item
    Then I am redirected to "Create New Category" Page

  Scenario: Create an Article
    Given I am at the "Article: New" Page
    When I create an article
    Then I should see my article in the "Article lists" Page

    !! Pensar estrategia de coverage, esto igual no es tan importante para hacer la primera suite de tests
  Scenario: Create an Article without title
    Given I am at the "Article: New" Page
    When I create an Article without title
    Then I should see an "invalid Field: title" missage at "new Article" page


    ```
    step  implementation
    assert->invalid title == Page/NewArticle/invalidTitleErrorMissage

    page object
    Page/NewArticle

    param: invalidTitleErrorMissage = "invalid Field: title"
    ```


  Scenario: Feature an Article
    Given I search and select content article with title "Article One"
    When I featured the article
    Then I should see the article is now featured

  Scenario: Modify an article
    Given I select the content article with title "Article One"
    When I set access level as a "Registered"
    And I save the article
    Then I should see the "Registered" as article access level

  Scenario: Unpublish an article
    Given I have article with name "Article One"
    When I unpublish the article
    Then I should see the article is now unpublished

  Scenario: Trash an article
    Given I have "Article One" content article which needs to be Trash
    When  I Trash the article
    Then  I should see the article "Article One" in trash
