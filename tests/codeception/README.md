[Browser Automated Tests for Joomla! CMS](https://summerofcode.withgoogle.com/projects/#5724182314745856)
===

Abstract
---
System development nowadays more than ever starts to look for automated test methods. There are several main drivers for this trend,
+ Need for faster design‐develop‐test‐analysis cycle
+ Push for higher quality
+ Increasing complexity of systems and their integration and last but not least
+ Ever‐rising costs of manual testing

Automation Testing means using an automation tool to execute test case suite. The automation software can also enter test data into the System Under Test, compare expected and actual results and generate detailed test reports.

Test Automation demands considerable investments of money and resources. Successive development cycles will require execution of same test suite repeatedly. Using a test automation tool it's possible to record this test suite and re-play it as required. Once the test suite is automated, no human intervention is required.

BDD (Behavior-driven development) Testing with Gherkin and Codeception
---

### What is Gherkin – BDD Language?

* Gherkin is a **human-readable** language for system behaviour description.
* Gherkin is a _natural_ language for testing that **Codeception** uses to define test cases.
* The test is written in plain `English` which is common to all the domains of project team.
* Test cases were designed to be **non-technical** and **human readable**, and **collectively describes**.
* This test is structured that makes it capable of being read in an automated way.
* Gherkin file have a `.feature` extention.

### Benefits of Gherkin?

### Main Keywords In Gherkin

* Feature
* Scenario
* Given, When, Then, And, But (Steps)
* Background
* Scenario outline
* Examples

### Example
Create a .feature using command `tests/codeception/vendor/bin/codecept generate:feature acceptance content`

File `content.feature` contains,

```gherkin
Feature: content
  In order to manage content article in the web
  As an owner
  I need to create modify trash publish and Unpublish content article

  Background:
    Given Joomla CMS is installed
    When Login into Joomla administrator with username "admin" and password "admin"
    Then I see administrator dashboard

  Scenario: Create an Article
    Given There is a add content link
    When I create new content with field title as "My_Article" and content as a "This is my first article"
    And I save an article
    Then I should see the "Article successfully saved." message
```
Generate snippets of .featuer file using command `tests/codeception/vendor/bin/codecept gherkin:snippets acceptance`

```snippets
/**
     * @Given There is a add content link
     */
     public function thereIsAAddContentLink()
     {
        throw new \Codeception\Exception\Incomplete("Step `There is a add content link` is not defined");
     }

    /**
     * @When I create new content with field title as :arg1 and content as a :arg2
     */
     public function iCreateNewContentWithFieldTitleAsAndContentAsA($arg1, $arg2)
     {
        throw new \Codeception\Exception\Incomplete("Step `I create new content with field title as :arg1 and content as a :arg2` is not defined");
     }

    /**
     * @When I save an article
     */
     public function iSaveAnArticle()
     {
        throw new \Codeception\Exception\Incomplete("Step `I save an article` is not defined");
     }

```
Copy the all snippets and put in stepobject file

Create a stepobject file using command `tests/codeception/vendor/bin/codecept generate:stepobject acceptance Administrator/content`

Define your step file path in `acceptance.suit.yml file`

For Example `- Step\Acceptance\Administrator\Content`

### Installation

1. Clone this repository using command below or download source from [here](https://github.com/joomla-projects/gsoc16_browser-automated-tests/archive/staging.zip)

    ```bash
    $ git clone git@github.com:joomla-projects/gsoc16_browser-automated-tests.git
    ```

2. Install `composer` in your system. Read more about [how to install composer](https://getcomposer.org/doc/00-intro.md) here.

3. Install composer packages using following steps from root directory of this project.
_We are using `composer.json` file for `tests/codeception` folder, so that you will have to run composer install from tests directory._

    ```bash
    $ cd tests/codeception 
    
    $ composer install
    ```

4. Copy `tests/codeception/acceptance.suite.dist.yml` to `tests/codeception/acceptance.suite.yml` and change settings according to your webserver.

    ```
    $ cp acceptance.suite.dist.yml acceptance.suite.yml
    ```

5. Get back to project root direcoty using `$ cd ../..`

### Run tests

To run the tests please execute the following commands. We are using [Robo.li](http://robo.li/) to execute [PhpUnit](https://phpunit.de/) based [Codeception](http://codeception.com/for/joomla) test suits.

#### To execute all the test features you should use.

```bash
$ tests/codeception/vendor/bin/robo run:tests
```

#### You can individual run `feature` using following command.

```bash
$ tests/codeception/vendor/bin/robo run:test
```

Or you can manually run them using codecept command. Check the following example:

```bash
$ tests/codeception/vendor/bin/codecept run tests/codeception/acceptance/users.feature
```

If you want to see steps then you can use `--steps` option of codeception. Check [full codecept command list here](http://codeception.com/docs/reference/Commands#Run)

**Note**:You can modify the timeout time by setting the value of **TIMEOUT** constant lower for fast machines and higher for slow computers. The constant located in the file `tests/codeception/acceptance/_bootstrap.php`

