<?php

/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Step
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Step\Acceptance\Administrator;

use Page\Acceptance\Administrator\FieldsManagerPage;
use Page\Acceptance\Administrator\FieldsManagerPage_New;
use Page\Acceptance\Administrator\ArticleManagerPage;
use Page\Acceptance\Site\FrontPage;

/**
 * Acceptance Step object class contains suits for Content Manager.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class Fields extends Admin
{
	/**
	 * Method to click toolbar button new from article manager listing page.
	 *
	 * @Given There is a add field link
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function thereIsAAddFieldLink()
	{
		$I = $this;

		$I->amOnPage(FieldsManagerPage::$url);
	}

	/**
	 * Method to fill the title field
	 *
	 * @param   string  $title  The field title
	 *
	 * @Given I fill field title with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldTitleWith($title)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$title, $title);
	}

	/**
	 * Method to fill the type field
	 *
	 * @param   string  $type  The field type
	 *
	 * @Given I select field type :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldType($type)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->selectOptionInChosenById(FieldsManagerPage_New::$type['id'], $type);
	}

	/**
	 * Method to fill the label field
	 *
	 * @param   string  $label  The field label
	 *
	 * @Given I fill field label  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldLabelWith($label)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$label, $label);
	}

	/**
	 * Method to fill the description field
	 *
	 * @param   string  $description  The field description
	 *
	 * @Given I fill field description  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldDescriptionWith($description)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$description, $description);
	}

	/**
	 * Method to fill the required field
	 *
	 * @param   string  $arg  The field required
	 *
	 * @Given I check option required :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionRequired($arg)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->click("//fieldset[@id='" . FieldsManagerPage_New::$required['id'] . "']/label[contains(normalize-space(string(.)), '" . $arg . "')]");
	}

	/**
	 * Method to fill the default value field
	 *
	 * @param   string  $default_value  The field default value
	 *
	 * @Given I fill field default_value  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldDefault_valueWith($default_value)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$default_value, $default_value);
	}

	/**
	 * Method to fill the state field
	 *
	 * @param   string  $state  The field state
	 *
	 * @Given I select field state :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldState($state)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->selectOptionInChosenById(FieldsManagerPage_New::$state['id'], $state);
	}

	/**
	 * Method to fill the field group field
	 *
	 * @param   string  $groupid  The field field group
	 *
	 * @Given I select field group :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldGroup($groupid)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->selectOptionInChosenById(FieldsManagerPage_New::$groupid['id'], $groupid);
	}

	/**
	 * Method to select a category in the categories field
	 *
	 * @param   string  $cat_ids  The categories
	 *
	 * @Given I select field cat :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldCat($cat_ids)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->click('#' . FieldsManagerPage_New::$cat_ids['id']);
		$I->click("//div[@id='" . FieldsManagerPage_New::$cat_ids['id'] .
				"']/div/ul/li[contains(normalize-space(string(.)), '" . $cat_ids . "')]");
	}

	/**
	 * Method to unselect a category in the categories field
	 *
	 * @param   string  $cat_ids  The categrories
	 *
	 * @Given I unselect field cat :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iUnselectFieldCats($cat_ids)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->click("//div[@id='" . FieldsManagerPage_New::$cat_ids['id'] .
				"']/ul/li/span[contains(normalize-space(string(.)), '" . $cat_ids .
				"')]/following-sibling::a[1]");
	}

	/**
	 * Method to fill the access field
	 *
	 * @param   string  $access  The access
	 *
	 * @Given I select field access :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldAccess($access)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo(['css' => '#' . FieldsManagerPage_New::$access['id']], 20, 100);
		$I->selectOptionInChosenById(FieldsManagerPage_New::$access['id'], $access);
	}

	/**
	 * Method to fill the language field
	 *
	 * @param   string  $language  The language
	 *
	 * @Given I select field language :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldLanguage($language)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo(['css' => '#' . FieldsManagerPage_New::$language['id']], 20, 100);
		$I->selectOptionInChosenById(FieldsManagerPage_New::$language['id'], $language);
	}

	/**
	 * Method to fill the note field
	 *
	 * @param   string  $note  The note
	 *
	 * @Given I fill field note with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldNoteWith($note)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo(['css' => '#' . FieldsManagerPage_New::$note['id']], 20, 100);
		$I->fillField(FieldsManagerPage_New::$note, $note);
	}

	/**
	 * Method to fill the show time field for cumstom field calendar
	 *
	 * @param   string  $arg  The field show time
	 *
	 * @Given I check option showtime :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionShowtime($arg)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->click("//fieldset[@id='" . FieldsManagerPage_New::$showtime['id'] . "']/label[contains(normalize-space(string(.)), '" . $arg . "')]");
	}

	/**
	 * Method to fill the options field for custom field list, checkbox and radio
	 *
	 * @param   string  $names_values  The options
	 *
	 * @Given I fill field options
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldOptions($names_values)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo(['css' => '.adminlist'], 20, 50);

		$totalRows = count($names_values->getRows());
		$lastIndex = ($totalRows - 1);

		$I->click('.group-add');

		foreach ($names_values->getRows() as $index => $row)
		{
			if ($index !== 0)
			{
				$I->fillField('#jform_fieldparams_options_options' . $index . '_name', $row[0]);
				$I->fillField('#jform_fieldparams_options_options' . $index . '_value', $row[1]);

				if ($index == $lastIndex)
				{
					// We do not have to do a click on save any more $I->click('.save-modal-data');
				}
				else
				{
					$I->click('.group-add');
				}
			}
		}
	}

	/**
	 * Method to fill the thumbnailswidth field for custom field gallery
	 *
	 * @param   string  $thumb  The thumbnailwidth
	 *
	 * @Given I fill field ThumbnailWidth  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldThumbnailWidthWith($thumb)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$thumbnail_width, $thumb);
	}

	/**
	 * Method to fill the maxwidth field for custom field gallery
	 *
	 * @param   string  $maxwidth  The maxwidth
	 *
	 * @Given I fill field MaxWidth  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldMaxWidthWith($maxwidth)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$max_width, $maxwidth);
	}

	/**
	 * Method to fill the maxheight field for custom field gallery
	 *
	 * @param   string  $maxheight  The maxheigth
	 *
	 * @Given I fill field MaxHeight  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldMaxHeightWith($maxheight)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$max_height, $maxheight);
	}

	/**
	 * Method to fill the recursive field for custom field gallery
	 *
	 * @param   string  $arg  The recursive
	 *
	 * @Given I check option recursive :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionRecursive($arg)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo("//select[@id='" . FieldsManagerPage_New::$recursive['id'] . "']");
		$I->selectOptionInChosenById(FieldsManagerPage_New::$recursive['id'], $arg);
	}

	/**
	 * Method to fill the multiple field for custom field gallery, image, integer, list, sql, userfield and usergroup
	 *
	 * @param   string  $arg  The multiple
	 *
	 * @Given I check option multiple :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionMultiple($arg)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo("//select[@id='" . FieldsManagerPage_New::$multiple['id'] . "']", 20, 200);
		$I->selectOptionInChosenById(FieldsManagerPage_New::$multiple['id'], $arg);
	}

	/**
	 * Method to fill the directory field for custom field gallery and media
	 * Attention: In image field directory is a select field -> use iSelectFieldDirectoryWith
	 *
	 * @param   string  $directory  The directory
	 *
	 * @Given I fill field directory  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldDirectoryWith($directory)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$directory, $directory);
	}

	/**
	 * Method to click field for hiding buttons in editor field
	 *
	 * @param   string  $arg  The arg (yes or no)
	 *
	 * @Given I check option buttons :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionButtons($arg)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->selectOptionInChosenById(FieldsManagerPage_New::$buttons['id'], $arg);
	}

	/**
	 * Method to fill the hide field for custom field editor
	 *
	 * @param   string  $hide  The fields to hide
	 *
	 * @Given I fill field hide  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldHideWith($hide)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$hide, $hide);
	}

	/**
	 * Method to fill the width field for custom field editor
	 *
	 * @param   string  $width  The width
	 *
	 * @Given I fill field width  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldWidthWith($width)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$width, $width);
	}

	/**
	 * Method to fill the height field for custom field editor
	 *
	 * @param   string  $height  The height
	 *
	 * @Given I fill field height  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldHeightWith($height)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$height, $height);
	}

	/**
	 * Method to fill the filter field
	 *
	 * @param   string  $filter  The field filter
	 *
	 * @Given I select field filter :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldFilter($filter)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo("//select[@id='" . FieldsManagerPage_New::$filter['id'] . "']", 10, 100);
		$I->selectOptionInChosenById(FieldsManagerPage_New::$filter['id'], $filter);
	}

	/**
	 * Method to fill the row field for custom field editor and textare
	 *
	 * @param   string  $rows  The rows
	 *
	 * @Given I fill field rows  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldRowsWith($rows)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$rows, $rows);
	}

	/**
	 * Method to fill the columns field for custom field editor and textarea
	 *
	 * @param   string  $cols  The columns
	 *
	 * @Given I fill field cols  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldColsWith($cols)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$cols, $cols);
	}

	/**
	 * Method to fill the directory field for custom field image
	 * Attention: In gallery and media field directory is a text field -> use iFillFieldDirectoryWith
	 *
	 * @param   string  $directory  The directory
	 *
	 * @Given I select field directory  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldDirectoryWith($directory)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->selectOptionInChosenById(FieldsManagerPage_New::$directory['id'], $directory);
	}

	/**
	 * Method to fill the image_class field for custom field image
	 *
	 * @param   string  $image_class  The image_class
	 *
	 * @Given I fill field image_class  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldImage_classWith($image_class)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$image_class, $image_class);
	}

	/**
	 * Method to fill the first field for custom field integer
	 *
	 * @param   string  $first  The first value
	 *
	 * @Given I fill field first  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldFirstWith($first)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$first, $first);
	}

	/**
	 * Method to fill the last field for custom field integer
	 *
	 * @param   string  $last  The last value
	 *
	 * @Given I fill field last  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldLastWith($last)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$last, $last);
	}

	/**
	 * Method to fill the step field for custom field integer
	 *
	 * @param   string  $step  The step value
	 *
	 * @Given I fill field step  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldStepWith($step)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$step, $step);
	}

	/**
	 * Method to fill the preview field for custom field media
	 *
	 * @param   string  $preview  The preview
	 *
	 * @Given I select field preview :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldPreview($preview)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->selectOptionInChosenById(FieldsManagerPage_New::$preview['id'], $preview);
	}

	/**
	 * Method to fill the home field for custom field media
	 *
	 * @param   string  $arg  The home
	 *
	 * @Given I check option home :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionHome($arg)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo("//select[@id='" . FieldsManagerPage_New::$home['id'] . "']");
		$I->selectOptionInChosenById(FieldsManagerPage_New::$home['id'], $arg);
	}

	/**
	 * Method to fill the query field for custom field sql
	 *
	 * @param   string  $query  The query
	 *
	 * @Given I fill field query  with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldQueryWith($query)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->fillField(FieldsManagerPage_New::$query, $query);
	}

	/**
	 * Method to select the schemes field for custom field url
	 *
	 * @param   string  $schemes  The schemes
	 *
	 * @Given I select field schemes :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldSchemes($schemes)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->click('#' . FieldsManagerPage_New::$schemes['id']);
		$I->click("//div[@id='" . FieldsManagerPage_New::$schemes['id'] . "']/div/ul/li[contains(normalize-space(string(.)), '" . $schemes . "')]");
	}

	/**
	 * Method to unselect the schemes field for custom field url
	 *
	 * @param   string  $schemes  The schemes
	 *
	 * @Given I unselect field schemes :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iUnselectFieldSchemes($schemes)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->click("//div[@id='" . FieldsManagerPage_New::$schemes['id'] .
				"']/ul/li/span[contains(normalize-space(string(.)), '" . $schemes .
				"')]/following-sibling::a[1]");
	}

	/**
	 * Method to check the relative field for custom field url
	 *
	 * @param   string  $arg  The relative value
	 *
	 * @Given I check option relative :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionRelative($arg)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$general);

		$I->scrollTo("//select[@id='" . FieldsManagerPage_New::$relative['id'] . "']");
		$I->selectOptionInChosenById(FieldsManagerPage_New::$relative['id'], $arg);
	}

	/**
	 * Method to fill the placeholder or hint field for custom field url
	 *
	 * @param   string  $placeholder  The placeholder value
	 *
	 * @Given I fill field placeholder with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldPlaceholderWith($placeholder)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$options);

		$I->fillField(FieldsManagerPage_New::$placeholder, $placeholder);
	}

	/**
	 * Method to fill the render class field for custom field url
	 *
	 * @param   string  $renderclass  The render class value
	 *
	 * @Given I fill field renderclass with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldRenderclassWith($renderclass)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$options);
		$I->fillField(FieldsManagerPage_New::$renderclass, $renderclass);
	}

	/**
	 * Method to fill the edit class field for custom field url
	 *
	 * @param   string  $editclass  The edit class value
	 *
	 * @Given I fill field editclass with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldEditclassWith($editclass)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$options);
		$I->fillField(FieldsManagerPage_New::$editclass, $editclass);
	}

	/**
	 * Method to check the disabled field for custom field url
	 *
	 * @param   string  $disabled  The disables value
	 *
	 * @Given I check option disabled :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionDisabled($disabled)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$options);

		$I->click("//fieldset[@id='" . FieldsManagerPage_New::$disabled['id'] . "']/label[contains(normalize-space(string(.)), '" . $disabled . "')]");
	}

	/**
	 * Method to check the readonly field for custom field url
	 *
	 * @param   string  $readonly  The readonly value
	 *
	 * @Given I check option readonly :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionReadonly($readonly)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$options);
		$I->click("//fieldset[@id='" . FieldsManagerPage_New::$readonly['id'] . "']/label[contains(normalize-space(string(.)), '" . $readonly . "')]");
	}

	/**
	 * Method to check the shown field for custom field url
	 *
	 * @param   string  $showon  The showon value
	 *
	 * @Given I check option showon :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iCheckOptionShowon($showon)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$options);
		$I->click("//fieldset[@id='" . FieldsManagerPage_New::$showon['id'] . "']/label[contains(normalize-space(string(.)), '" . $showon . "')]");
	}

	/**
	 * Method to check the relative field for custom field url
	 *
	 * @param   string  $display  The display value
	 *
	 * @Given I select field automaticdisplay with :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSelectFieldAutomaticdisplayWith($display)
	{
		$I = $this;

		$I->scrollTo(['id' => 'myTabTabs'], 10, -100);
		$I->click(FieldsManagerPage_New::$options);

		$I->selectOptionInChosenById(FieldsManagerPage_New::$display['id'], $display);
	}

	/**
	 * Method to check if I see the system message with the in the
	 * argument provided text
	 *
	 * @param   string  $message  The message text
	 *
	 * @Then I see message :arg1
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSeeMessage($message)
	{
		$I = $this;

		$I->fieldsManagerPage_New->seeSystemMessage(FieldsManagerPage_New::$pageTitleText, $message);
	}

	/**
	 * Method to check if I see the system message with the in the
	 * argument provided text
	 *
	 * @param   string  $label         The label of the field
	 * @param   string  $type          The type of the field
	 * @param   string  $fieldgroup    The name of the fieldgroup
	 * @param   string  $category      The name of the category
	 * @param   string  $articletitle  The title of the article
	 *
	 * @Then I see the label :arg1 of type :arg2 in register :arg3 for category :arg4 if I create an article with title :arg5
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iSeeTheLabelOfTypeInRegisterForCategoryIfICreateAnArticleWithTitle($label, $type, $fieldgroup, $category, $articletitle)
	{
		$I = $this;

		$I->amOnPage(ArticleManagerPage::$url);
		$I->adminPage->clickToolbarButton('New');

		$I->fillField(ArticleManagerPage::$title, $articletitle);
		$I->wait(1);
		$I->scrollTo(['css' => 'div.toggle-editor'], 20, 100);
		$I->wait(1);
		$I->click(ArticleManagerPage::$toggleEditor);
		$I->fillField(ArticleManagerPage::$content, 'Test content for testing field');

		$I->scrollTo(['css' => '#jform_featured'], 20, -100);
		$I->click("//fieldset[@id='" . 'jform_featured' . "']/label[contains(normalize-space(string(.)), 'Yes')]");

		$I->wait(1);
		$I->adminPage->selectOptionInChosenById('jform_catid', $category);
		$I->wait(1);
		$I->scrollTo(['css' => '#item-form'], 20, -100);
		$I->click($fieldgroup);

		$I->see($label);

		switch ($type)
		{
			case "Calendar":
				break;
			case "":
				break;
			default:
		}

		$I->adminPage->clickToolbarButton('Save');
	}

	/**
	 * Method to fill test if I can fill the text field
	 *
	 * @param   string  $field  The field that should be filled
	 * @param   string  $text   The that should be filled in
	 *
	 * @Then I can fill field :arg1 with the text :arg2
	 *
	 * @return  void
	 */
	public function iCanFillFieldWithTheText($field, $text)
	{
		$I = $this;

		$I->fillField('#jform_params_' . str_replace(' ', '_', strtolower(trim($field))), $text);
		$I->adminPage->clickToolbarButton('Save');
	}

	/**
	 * Method to check if I can see the textfield int the frontend
	 *
	 * @param   string  $text          The in the text field that should be displayed
	 * @param   string  $label         The label that should be displayed
	 * @param   string  $articletitle  The title of the article that should be show the field
	 *
	 * @Then I can see the field with the text :arg1 and the label :arg2 in frontend in the articel with title :arg3
	 *
	 * @return  void
	 */
	public function iCanSeeTheFieldWithTheTextAndTheLabelInFrontendInTheArticelWithTitle($text, $label, $articletitle)
	{
		$I = $this;

		$I->amOnPage(FrontPage::$url);
		$I->click($articletitle);
		$I->see($text);
		$I->see($label);
	}

	/**
	 * Method to sae and close custum field
	 *
	 * @Given I save and close custom field
	 *
	 * @return  void
	 */
	public function iSaveAndCloseCustomField()
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('Save & Close');
		$I->comment('READY');
	}

	/**
	 * Method to fill all fields for a custom field
	 *
	 * @param   string  $field_params  The field_params
	 *
	 * @When I fill fields for creating Field
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function iFillFieldsForCreatingField($field_params)
	{
		$I = $this;

		$I->adminPage->clickToolbarButton('New');

		$totalRows = count($field_params->getRows());
		$lastIndex = ($totalRows - 1);

		// Iterate over all rows
		foreach ($field_params->getRows() as $index => $row)
		{
			if ($index !== 0)
			{
				// Standard
				if (isset($row[0]) and ! empty($row[0]))
				{
					$this->iFillFieldTitleWith($row[0]);
				}

				if (isset($row[1]) and ! empty($row[1]))
				{
					$this->iSelectFieldType($row[1]);
				}

				if (isset($row[2]) and ! empty($row[2]))
				{
					$this->iFillFieldLabelWith($row[2]);
				}

				if (isset($row[3]) and ! empty($row[3]))
				{
					$this->iFillFieldDescriptionWith($row[3]);
				}

				if (isset($row[4]) and ! empty($row[4]))
				{
					$this->iCheckOptionRequired($row[4]);
				}

				if (isset($row[5]) and ! empty($row[5]))
				{
					$this->iFillFieldDefault_valueWith($row[5]);
				}

				if (isset($row[6]) and ! empty($row[6]))
				{
					$this->iSelectFieldState($row[6]);
				}

				if (isset($row[7]) and ! empty($row[7]))
				{

					$this->iSelectFieldGroup($row[7]);
				}

				// I can't use iSelectFieldCats
				if (isset($row[8]) and ! empty($row[8]))
				{
					$I->click('#' . FieldsManagerPage_New::$cat_ids['id']);
					$I->click("//div[@id='" . FieldsManagerPage_New::$cat_ids['id'] .
							"']/div/ul/li[contains(normalize-space(string(.)), '" . $row[8] .
							"')]");
					$I->click("//div[@id='" . FieldsManagerPage_New::$cat_ids['id'] .
							"']/ul/li/span[contains(normalize-space(string(.)), 'All')]/following-sibling::a[1]");
				}

				if (isset($row[9]) and ! empty($row[9]))
				{
					$this->iSelectFieldAccess($row[9]);
				}

				if (isset($row[10]) and ! empty($row[10]))
				{
					$this->iSelectFieldLanguage($row[10]);
				}

				if (isset($row[11]) and ! empty($row[11]))
				{
					$this->iFillFieldNoteWith($row[11]);
				}

				// CALENDARFIELD
				if ($row[1] == "Calendar (calendar)" and isset($row[12]) and ! empty($row[12]))
				{
					$this->iCheckOptionShowtime($row[12]);
				}

				// CHECKBOX LIST and RADIO
				if (($row[1] == "Checkboxes (checkboxes)" or $row[1] == "List (list)" or $row[1] == "Radio (radio)") and isset($row[13]) and ! empty($row[13]))
				{
					$arr = explode(',', $row[13]);
					$I->scrollTo(['css' => '.adminlist'], 20, 50);

					$max = sizeof($arr);

					$I->click('.group-add');

					foreach ($arr as $index => $item)
					{
						$css = $index + 1;
						$I->fillField('#jform_fieldparams_options_options' . $css . '_name', $item);
						$I->fillField('#jform_fieldparams_options_options' . $css . '_value', $item);

						if ($max - 1 !== $index)
						{
							$I->click('.group-add');
						}
					}
				}

				// Editor
				if ($row[1] == "Editor (editor)" and isset($row[14]) and ! empty($row[14]))
				{
					$this->iCheckOptionButtons($row[14]);
				}

				if ($row[1] == "Editor (editor)" and isset($row[15]) and ! empty($row[15]))
				{
					$this->iFillFieldHideWith($row[15]);
				}

				if ($row[1] == "Editor (editor)" and isset($row[16]) and ! empty($row[16]))
				{
					$I->iFillFieldWidthWith($row[16]);
				}

				if ($row[1] == "Editor (editor)" and isset($row[17]) and ! empty($row[17]))
				{
					$this->iFillFieldHeightWith($row[17]);
				}

				// Textarea
				if (($row[1] == "Text Area (textarea)") and isset($row[18]) and ! empty($row[18]))
				{
					$I->fillField(FieldsManagerPage_New::$rows, $row[18]);
				}

				if (($row[1] == "Text Area (textarea)") and isset($row[19]) and ! empty($row[19]))
				{
					$I->fillField(FieldsManagerPage_New::$cols, $row[19]);
				}

				// Gallery
				if (($row[1] == "Gallery (gallery") and isset($row[20]) and ! empty($row[20]))
				{
					$this->iFillFieldThumbnailWidthWith($row[20]);
				}

				if (($row[1] == "Gallery (gallery") and isset($row[21]) and ! empty($row[21]))
				{
					$this->iFillFieldMaxWidthWith($row[21]);
				}

				if (($row[1] == "Gallery (gallery") and isset($row[22]) and ! empty($row[22]))
				{
					$this->iFillFieldMaxHeightWith($row[22]);
				}

				if (($row[1] == "Gallery (gallery") and isset($row[23]) and ! empty($row[23]))
				{
					$this->iCheckOptionRecursive($row[23]);
				}

				// Gallery, Image, Integer, List, User, Usergrouplist
				if (($row[1] == "Gallery (gallery)"
					or $row[1] == "Imagelist (imagelist)"
					or $row[1] == "Integer (integer)"
					or $row[1] == "List (list)"
					or $row[1] == "SQL sql"
					or $row[1] == "User (user)"
					or $row[1] == "User Groups (usergrouplist)")
					and isset($row[24]) and ! empty($row[24]))
				{
					$this->iCheckOptionMultiple($row[24]);
				}

				// Gallery and Media
				if (($row[1] == "Gallery (gallery)" or $row[1] == "Media (media)") and isset($row[25]) and ! empty($row[25]))
				{
					$this->iFillFieldDirectoryWith($row[25]);
				}

				// Image
				if ((($row[1] == "Imagelist (imagelist)") || ($row[1] == "Media (media)")) and isset($row[26]) and ! empty($row[26]))
				{
					$this->iFillFieldImage_classWith($row[26]);
				}

				// Integer
				if (($row[1] == "Integer (integer)") and isset($row[27]) and ! empty($row[27]))
				{
					$this->iFillFieldFirstWith($row[27]);
				}

				if (($row[1] == "Integer (integer)") and isset($row[28]) and ! empty($row[28]))
				{
					$this->iFillFieldLastWith($row[28]);
				}

				if (($row[1] == "Integer (integer)") and isset($row[29]) and ! empty($row[29]))
				{
					$this->iFillFieldStepWith($row[29]);
				}

				// Media
				if (($row[1] == "Media (media)") and isset($row[30]) and ! empty($row[30]))
				{
					$this->iSelectFieldPreview($row[30]);
				}

				if (($row[1] == "Media (media)") and isset($row[31]) and ! empty($row[31]))
				{
					$this->iCheckOptionHome($row[31]);
				}

				// SQL
				if (($row[1] == "SQL (sql)") and isset($row[32]) and ! empty($row[32]))
				{
					$this->iFillFieldQueryWith($row[32]);
				}

				// URL
				if (($row[1] == "Url (url)") and isset($row[33]) and ! empty($row[33]))
				{
					$this->iSelectFieldSchemes($row[33]);
				}

				if (($row[1] == "Url (url)") and isset($row[34]) and ! empty($row[34]))
				{
					$this->iCheckOptionRelative($row[34]);
				}

				// TEXT
				if (($row[1] == "Text (text)") and isset($row[36]) and ! empty($row[36]))
				{
					$this->iSelectFieldFilter($row[36]);
				}

				// Options Register
				if (isset($row[35]) and ! empty($row[35]))
				{
					$this->iFillFieldPlaceholderWith($row[35]);
				}

				if (isset($row[38]) and ! empty($row[38]))
				{
					$this->iFillFieldRenderclassWith($row[38]);
				}

				if (isset($row[39]) and ! empty($row[39]))
				{
					$this->iFillFieldEditclassWith($row[39]);
				}

				if (isset($row[40]) and ! empty($row[40]))
				{
					$this->iCheckOptionDisabled($row[40]);
				}

				if (isset($row[41]) and ! empty($row[41]))
				{
					$this->iCheckOptionReadonly($row[41]);
				}

				if (isset($row[42]) and ! empty($row[42]))
				{
					$this->iCheckOptionShowon($row[42]);
				}

				if (isset($row[43]) and ! empty($row[43]))
				{
					$this->iSelectFieldAutomaticdisplayWith($row[43]);
				}

				// Last Field should use Save & Close
				if ($index == $lastIndex)
				{
					$I->adminPage->clickToolbarButton('Save & Close');
					$I->comment('READY');
				}
				else
				{
					$I->adminPage->clickToolbarButton('Save & New');
				}
			}
		}
	}
}
