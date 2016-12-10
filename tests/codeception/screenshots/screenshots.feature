Feature: screenshot genetation for documentation
  As an Documentation Team member
  I need to create screenshots of every Joomla page automatically
  In order to easily maintain the documentation wiki page

  Scenario: create screenshot of com_content new article
    Given I am at "administrator/index.php?option=com_content&task=article.add" page
    Given I am at the tab "images and links"
    Then I should see a generated screenshot at "folder/dadada/name.png"