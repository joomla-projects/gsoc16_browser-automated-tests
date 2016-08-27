<?php
/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Step
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Step\Acceptance\Administrator;

use Behat\Gherkin\Node\TableNode;
use Page\Acceptance\Administrator\CategoryManagerPage;
use Page\Acceptance\Administrator\MenuManagerPage;
use Page\Acceptance\Site\FrontPage;

/**
 * Acceptance Step object class contains suits for Category Manager.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class Category extends Admin
{
	/**
	 * Category link
	 *
	 * @Given There is an article category link
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function thereIsAnArticleCategoryLink()
	{
		$I = $this;

		$I->amOnPage(CategoryManagerPage::$url);
	}

	/**
	 * Check available tabs in category detail view
	 *
	 * @When I check available tabs in category
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckAvailableTabsInCategory()
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('New');
		$I->waitForText('Articles: New Category');
	}

	/**
	 * Found avilable tabs
	 *
	 * @param   string  $tab1  Name of the tab1
	 * @param   string  $tab2  Name of the tab2
	 * @param   string  $tab3  Name of the tab3
	 * @param   string  $tab4  Name of the tab4
	 *
	 * @Then I see available tabs :arg1, :arg2, :arg3 and :arg4
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSeeAvailableTabsAnd($tab1, $tab2, $tab3, $tab4)
	{
		$I = $this;

		$I->adminPage->verifyAvailableTabs([$tab1, $tab2, $tab3, $tab4]);
	}

	/**
	 * Fill mandatory fields in category form
	 *
	 * @param   TableNode  $title  An array of the category title
	 *
	 * @When I fill mandatory fields for creating Category
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillMandatoryFieldsForCreatingCategory(TableNode $title)
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('New');

		$totalRows = count($title->getRows());
		$lastIndex = ($totalRows - 1);

		// Iterate over all rows
		foreach ($title->getRows() as $index => $row)
		{
			if ($index !== 0)
			{
				$I->fillField(CategoryManagerPage::$title, $row[0]);

				if ($index == $lastIndex)
				{
					$I->adminPage->clickToolbarButton('Save');
				}
				else
				{
					$I->adminPage->clickToolbarButton('Save & New');
				}
			}
		}
	}

	/**
	 * Method to confirm that category is created
	 *
	 * @param   string  $category  The category Name
	 *
	 * @Then I should see the category :category is created
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeTheCategoryIsCreated($category)
	{
		$I = $this;

		$I->categoryManagerPage->seeItemIsCreated($category);
	}

	/**
	 * Save category form
	 *
	 * @When I save the category
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSaveTheCategory()
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('Save');
	}

	/**
	 * Search to select category with given title
	 *
	 * @param   string  $title  The category title
	 *
	 * @When I search and select category with title :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSearchAndSelectCategoryWithTitle($title)
	{
		$I = $this;

		$I->categoryManagerPage->haveItemUsingSearch($title);
		$I->adminPage->clickToolbarButton('edit');
	}

	/**
	 * Method to set category title
	 *
	 * @param   string  $title  The category title
	 *
	 * @When I set the title as a :title
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSetTheTitleAsA($title)
	{
		$I = $this;

		$I->fillField(CategoryManagerPage::$title, $title);
	}

	/**
	 * Method to unpublish category
	 *
	 * @param   string  $title  The category title
	 *
	 * @Given I have a category with title :arg1 which needs to be unpublish
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iHaveACategoryWithTitleWhichNeedsToBeUnpublish($title)
	{
		$this->categoryManagerPage->haveItemUsingSearch($title);
	}

	/**
	 * Method to click unpublish button
	 *
	 * @When I unpublish the category
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iUnpublishTheCategory()
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('unpublish');
	}

	/**
	 * Confirm the category is unpublished
	 *
	 * @Then I should see the category is now unpublished
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeTheCategoryIsNowUnpublished()
	{
		$I = $this;

		$I->seeNumberOfElements(CategoryManagerPage::$seeUnpublished, 1);
	}

	/**
	 * Method to trash the category
	 *
	 * @param   string  $title  The category title
	 *
	 * @Given I have a category with title :arg1 which needs to be trash
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iHaveACategoryWithTitleWhichNeedsToBeTrash($title)
	{
		$this->categoryManagerPage->haveItemUsingSearch($title);
	}

	/**
	 * Method to click trash button
	 *
	 * @When I trash the category
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iTrashTheCategory()
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('trash');
	}

	/**
	 * Assure the category is trashed.
	 *
	 * @param   string  $category  The article name
	 *
	 * @Then I should see the category :category in trash
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeTheInTrash($category)
	{
		$I = $this;

		$I->categoryManagerPage->seeItemInTrash($category, 'Articles: Categories');
	}

	/**
	 * Method to create new category without title
	 *
	 * @When I create new category without field title
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCreateNewCategoryWithoutFieldTitle()
	{
		$I = $this;

		$I->amOnPage(CategoryManagerPage::$url);
		$I->adminPage->clickToolbarButton('New');

		$I->waitForText('Articles: New Category');
		$I->adminPage->clickToolbarButton('Save');
	}

	/**
	 * Method to see an error
	 *
	 * @param   string  $error  The error message
	 *
	 * @Then I should see the :error
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeThe($error)
	{
		$I = $this;

		$I->see($error, CategoryManagerPage::$invalidTitle);
	}

	/**
	 * Method to create new article
	 *
	 * @param   string  $title    The article title
	 * @param   string  $content  The article content
	 *
	 * @When I create a new article :title with content as a :content
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCreateANewArticleWithContentAsA($title, $content)
	{
		$this->articleManagerPage->fillContentCreateForm($title, $content);
	}

	/**
	 * Method to create menu item for article
	 *
	 * @param   string  $title  The menu item title
	 *
	 * @When I create menu item with title :title
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCreateMenuItemWithTitle($title)
	{
		$I = $this;

		$I->menuManagerPage->prepareMenuItemCreate($title);
	}

	/**
	 * Method to choose article type for article menu item
	 *
	 * @param   string  $title     The article title
	 * @param   string  $menuItem  The article menu item type
	 *
	 * @When I choose menu item type :title and select :menuItem
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iAddTheMenuItemInMainMenu($title, $menuItem)
	{
		$I = $this;

		$I->menuManagerPage->selectMenuItemType($title, $menuItem);
	}

	/**
	 * Method to select an article for menu item
	 *
	 * @param   string  $title  The article title
	 *
	 * @When I select an article :title
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectAnArticle($title)
	{
		$I = $this;

		$I->click(MenuManagerPage::$selectArticle);

		$I->switchToIFrame("Select or Change article");

		// Setting page object to choose article title
		MenuManagerPage::setChooseArticle($title);

		$I->waitForElement(MenuManagerPage::$chooseArticle, 60);
		$I->checkForPhpNoticesOrWarnings();
		$I->click(MenuManagerPage::$chooseArticle);

		$I->switchToIFrame();

		// Waiting to close the iframe properly
		$I->wait(1);
	}

	/**
	 * Method to save menu item
	 *
	 * @When I save the menu item
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSaveTheMenuItem()
	{
		$I = $this;

		$I->adminPage->waitForPageTitle('Menus: New Item');
		$I->adminPage->clickToolbarButton('save & close');
	}

	/**
	 * Method to confirm that menu item is created
	 *
	 * @param   string  $item  The menu item Name
	 *
	 * @Then I should see the menu item :item is created
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeTheMenuItemIsCreated($item)
	{
		$I = $this;

		$I->menuManagerPage->seeItemIsCreated($item);
	}

	/**
	 * Method to select category
	 *
	 * @param   string  $name  The category name
	 *
	 * @When I set category as a :name
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSetCategoryAsA($name)
	{
		$I = $this;

		$I->adminPage->selectOptionInChosenById('jform_catid', $name);
	}

	/**
	 * Method to select top level category
	 *
	 * @param   string  $name  The category name
	 *
	 * @When I select a top level category :name
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectATopLevelCategory($name)
	{
		$I = $this;

		$I->adminPage->selectOptionInChosenById('jform_request_id', $name);
	}

	/**
	 * Method to set access level
	 *
	 * @param   string  $accessLevel  The name of access level which needs to be verify
	 *
	 * @Then I should see the :accessLevel as category access level
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeTheCategoryAsTheAccessLevel($accessLevel)
	{
		$I = $this;

		$I->amOnPage(CategoryManagerPage::$url);
		$I->see($accessLevel, CategoryManagerPage::$seeAccessLevel);
	}

	/**
	 * Method to set language
	 *
	 * @param   string  $name  The language name
	 *
	 * @When I set language as a :name
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSetLanguageAsA($name)
	{
		$I = $this;

		$I->adminPage->selectOptionInChosenById('jform_language', $name);
	}

	/**
	 * Method to check language is saved
	 *
	 * @param   string  $title  The name of access level which needs to be verify
	 *
	 * @Then I should see the category language as :title
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSeeTheCategoryLanguage($title)
	{
		$I = $this;

		$I->amOnPage(CategoryManagerPage::$url);
		$I->see($title, CategoryManagerPage::$seeLanguage);
	}

	/**
	 * Method go to joomla home page
	 *
	 * @Given There is joomla home page
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function thereIsJoomlaHomePage()
	{
		$I = $this;

		$I->amOnPage(FrontPage::$url);
	}

	/**
	 * Method to click menu
	 *
	 * @param   string  $title  The menu title
	 *
	 * @When I press on :arg1 menu
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iPressOnMenu($title)
	{
		$I = $this;

		$I->click(MenuManagerPage::$article);
	}

	/**
	 * Method to wait for article text
	 *
	 * @param   string  $title  The article title
	 *
	 * @Then I should see the :title in home page
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeTheInHomePage($title)
	{
		$I = $this;

		$I->waitForText($title);
	}

	/**
	 * Method to click menu item on home page
	 *
	 * @param   string  $menuItem  The menu item title
	 *
	 * @When I press on :menuItem menu in joomla home page
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iPressOnMenuInJoomlaHomePage($menuItem)
	{
		$I = $this;

		$I->amOnPage(FrontPage::$url);
		$I->click(MenuManagerPage::$article);
	}

	/**
	 * Method to see an error
	 *
	 * @param   string  $error  The error message
	 *
	 * @Then I should see the :arg1 error
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iShouldSeeTheError($error)
	{
		$I = $this;

		$I->see($error, FrontPage::$alertMessage);
	}
}
