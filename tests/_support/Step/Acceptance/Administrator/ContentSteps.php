<?php
namespace Step\Acceptance\Administrator;

class ContentSteps extends \AcceptanceTester
{
	/**
	 * @Given There is a Add Content link
	 */
	public function thereIsAAddContentLink()
	{
		$I = $this;
		$I->amOnPage('administrator/index.php?option=com_content&view=articles');
		$I->clickToolbarButton('New');
	}

	/**
	 * @When I fill mandatory fields for creating article
	 */
	public function iFillMandatoryFieldsForCreatingArticle(\Behat\Gherkin\Node\TableNode $fields)
	{
		$I = $this;
		// iterate over all rows
		foreach ($fields->getRows() as $index => $row) {
			if ($index === 0) { // first row to define fields
				$keys = $row;
				continue;
			}
			else
			{
				if ($row[0] == "title")
				{
					$I->fillField(['id' => 'jform_title'], $row[1]);
				}

				if ($row[0] == "content")
				{
					$I->click('Toggle editor');
					$I->fillField(['id' => 'jform_articletext'], $row[1]);
				}
			}
		}
	}

	/**
	 * @When I save an article
	 */
	public function iSaveAnArticle()
	{
		$I = $this;
		$I->clickToolbarButton('Save');
	}
}