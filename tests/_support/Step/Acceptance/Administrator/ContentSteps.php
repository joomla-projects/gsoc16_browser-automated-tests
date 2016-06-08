<?php
namespace Step\Administrator;

class ContentSteps
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
				foreach ($row as $field => $value)
				{
					if ($field == "title")
					{
						$I->fillField(['id' => 'jform_title'], $value);
					}

					if ($field == "content")
					{
						$I->click('Toggle editor');
						$I->fillField(['id' => 'jform_articletext'], $value);
					}
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