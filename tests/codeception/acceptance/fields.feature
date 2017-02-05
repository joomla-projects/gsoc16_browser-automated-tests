Feature: CustomFields
  In order to manage Custom Fields in the web
  I need to create Custom Fields with all options

  Background:
    When I Login into Joomla administrator
    And I see the administrator dashboard

  ###
  ### Create a field group for using in the custom field creation
  ###
  Scenario: Create a Field Group
    Given There is a add field group link
    And I click toolbar button "New"
    And I fill field title with "NewFieldGroup"
    And I click toolbar button "Save"

  ###
  ### You can create many field groups if you need
  ###
  Scenario: Create many Field Groups
    Given There is a add field group link
    When I fill mandatory fields for creating Field Group
      | Title           |
      | NewFieldGroup_1 |
      | NewFieldGroup_2 |

  ###
  ### Create a category for using in the custom field creation
  ###
  Scenario: Create new categories
    Given There is an article category link
    When I fill mandatory fields for creating Category
      | Title                     |
      | Category_FieldGroupTest_1 |
      | Category_FieldGroupTest_2 |

  ###
  ### CALENDAR with all options
  ###
  Scenario: Create Calendar field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewCalendarField"
    ##Type
    And I select field type "Calendar (calendar)"
    ##Label
    And I fill field label  with "Label for NewCalendarField"
    ##Description
    And I fill field description  with "Decription for NewCalendarField"
    ##Required
    And I check option required "Yes"
    And I check option required "No"
    ##Default #invalide default breaks the article view
    And I fill field default_value  with "2017-01-01"
    ##State
    And I select field state "Trashed"
    And I select field state "Published"
    And I select field state "Unpublished"
    And I select field state "Archived"
    ##FieldGroup
    And I select field group "NewFieldGroup"
    ##Categorie
    And I select field cat "Category_FieldGroupTest_2"
    And I unselect field cat "All"
    ##Access
    And I select field access "Public"
    And I select field access "Registered"
    And I select field access "Special"
    And I select field access "Super Users"
    ##Language
    And I select field language "English (en-GB)"
    ##Note
    And I fill field note with "My personal note"
    And I click toolbar button "Save"
    ##Placeholder
    And I fill field placeholder with "placeholder"
    ##Renderclass
    And I fill field renderclass with "renderclass"
    ##Editclass
    And I fill field editclass with "editclass"
    ##Disabled
    And I check option disabled "Yes"
    And I check option disabled "No"
    ##Readonly
    And I check option readonly "Yes"
    And I check option readonly "No"
    ##Showon
    And I check option showon "Site"
    And I check option showon "Administrator"
    And I check option showon "Both"
    ##Automaticdisplay
    And I select field automaticdisplay with "After Title"
    And I select field automaticdisplay with "Before Display"
    And I select field automaticdisplay with "After Display"
    And I select field automaticdisplay with "No"
    ##Extras for calendar field
    ##Showtime
    And I check option showtime "Yes"
    And I check option showtime "No"
    ##Save the field
    And I save and close custom field

  ###
  ### CHECKBOX only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Checkbox field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewCheckboxField"
    ##Type
    And I select field type "Checkboxes (checkboxes)"
    ##...
    ##Extras for checkbox field
    And I fill field options
      | Name   | Value   |
      | Name_1 | Value_1 |
      | Name_2 | Value_2 |
      | Name_3 | Value_3 |
      | Name_4 | Value_4 |
    ##Save the field
    And I save and close custom field

  ###
  ### COLOR only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Colour field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewColourField"
    ##Type
    And I select field type "Colour (color)"
    ##...
    ## No extras for color field
    ##Save the field
    And I save and close custom field

  ###
  ### EDITOR only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Editor field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewEditorField"
    ##Type
    And I select field type "Editor (editor)"
    ## Extras for editor field
    ##Buttons
    And I check option buttons "Yes"
    And I check option buttons "No"
    And I check option buttons "Use From Plugin"
    ##Hide
    And I fill field hide  with "pagebreak,readmore"
    ##Width
    And I fill field width  with "50%"
    ##Height
    And I fill field height  with "100px"
    ##Save the field
    And I save and close custom field

  ###
  ### GALLERY only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Gallery field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewGalleryField"
    ##Type
    And I select field type "Gallery (gallery)"
    ## ...
    ## Extras for gallery field
    ##ThumbnailWidth
    And I fill field ThumbnailWidth  with "50"
    ##MaxWidth
    And I fill field MaxWidth  with "200"
    ##MaxHeight
    And I fill field MaxHeight  with "200"
    ##Recursiv
    And I check option recursive "Yes"
    And I check option recursive "No"
    And I check option recursive "Use From Plugin"
    ##Multiple
    And I check option multiple "Yes"
    And I check option multiple "No"
    And I check option multiple "Use From Plugin"
    ##Directory
    And I fill field directory  with "images/sampledata"
    ##Save the field
    And I save and close custom field

  ###
  ### INTEGER only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Integer field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewIntegerField"
    ##Type
    And I select field type "Integer (integer)"
    ## ...
    ## Extras for integer field
    ##Multiple
    And I check option multiple "Yes"
    And I check option multiple "No"
    And I check option multiple "Use From Plugin"
    ##First
    And I fill field first  with "10"
    ##Last
    And I fill field last  with "50"
    ##Step
    And I fill field step  with "2"
    ##Save the field
    And I save and close custom field

  ###
  ### LIST only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create List field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewListField"
    ##Type
    And I select field type "List (list)"
    ## ...
    ## Extras for list field
    ##Multiple
    And I check option multiple "Yes"
    And I check option multiple "No"
    And I check option multiple "Use From Plugin"
    And I fill field options
      | Name   | Value   |
      | Name_1 | Value_1 |
      | Name_2 | Value_2 |
      | Name_3 | Value_3 |
      | Name_4 | Value_4 |
    ##Save the field
    And I save and close custom field

  ###
  ### LIST OFIMAGES only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create List of Images field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewListofImagesField"
    ##Type
    And I select field type "List of Images (imagelist)"
    ## ...
    ## Extras for images field
    ##Directory
    And I select field directory  with "sampledata"
    ##Multiple
    And I check option multiple "Yes"
    And I check option multiple "No"
    And I check option multiple "Use From Plugin"
    ##Image_class
    And I fill field image_class  with "my_imageclass_for_testing_imagefield"
    ##Save the field
    And I save and close custom field

  ###
  ### MEDIA only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Media field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewMediaField"
    ##Type
    And I select field type "Media (media)"
    ## ...
    ## Extras for media field
    ##Directory
    And I fill field directory  with "images/sampledata"
    ##Preview
    And I select field preview "Tooltip"
    And I select field preview "Inline"
    And I select field preview "No"
    ##Home
    And I check option home "No"
    And I check option home "Yes"
    And I check option home "Use From Plugin"
    ##Image_class
    And I fill field image_class  with "my_imageclass_for_testing_imagefield"
    ##Save the field
    And I save and close custom field

  ###
  ### RADIO only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Radio field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewRadioField"
    ##Type
    And I select field type "Radio (radio)"
    ## ...
    ## Extras for radio field
    And I fill field options
      | Name   | Value   |
      | Name_1 | Value_1 |
      | Name_2 | Value_2 |
      | Name_3 | Value_3 |
      | Name_4 | Value_4 |
    ##Save the field
    And I save and close custom field

  ###
  ### SQL only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create SQL field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewSQLField"
    ##Type
    And I select field type "SQL (sql)"
    ## ...
    ## Extras for sql field
    ##Query
    And I fill field query  with "select id as value, title as text from #__modules"
    ##Multiple
    And I check option multiple "Yes"
    And I check option multiple "No"
    And I check option multiple "Use From Plugin"
    ##Save the field
    And I save and close custom field

  ###
  ### TEXT only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Text field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewTextField"
    ##Type
    And I select field type "Text (text)"
    ## ...
    ## Extras for text field
    ## Filter
    And I select field filter "Use From Plugin"
    And I select field filter "Raw"
    And I select field filter "No"
    ##Save the field
    And I save and close custom field

  ###
  ### TESTAREA only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Textarea field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewTextareaField"
    ##Type
    And I select field type "Text Area (textarea)"
    ## ...
    ## Extras for textarea field
    ##Rows
    And I fill field rows  with "20"
    ##Cols
    And I fill field cols  with "20"
    ##Save the field
    And I save and close custom field

  ###
  ### URL only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Url field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewUrlField"
    ##Type
    And I select field type "Url (url)"
    ## ...
    ## Extras for url field
    ##Schemes
    And I select field schemes "FILE"
    And I select field schemes "MAILTO"
    And I select field schemes "HTTP"
    And I select field schemes "FTP"
    And I select field schemes "FTPS"
    And I select field schemes "URL"
    And I unselect field schemes "MAILTO"
    ##Relative
    And I check option relative "Yes"
    And I check option relative "No"
    And I check option relative "Use From Plugin"
    ##Save the field
    And I save and close custom field

  ###
  ### USER only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create User field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewUserField"
    ##Type
    And I select field type "User (user)"
    ## ...
    ## No extras for user field
    ##Save the field
    And I save and close custom field

  ###
  ### USERGROUPS only with required and special checkbox options,
  ###          see Calendar field for all options
  ###
  Scenario: Create Usergroup field
    Given There is a add field link
    And I click toolbar button "New"
    ##Title
    And I fill field title with "NewListofUsergroupField"
    ##Type
    And I select field type "User Groups (usergrouplist)"
    ## ...
    ## Extras for usergroup field
    ##Multiple
    And I check option multiple "Yes"
    And I check option multiple "No"
    And I check option multiple "Use From Plugin"
    ##Save the field
    And I save and close custom field

  ###
  ### Create many fields
  ###
  Scenario: Create many Fields
    Given There is a add field link
    When I fill fields for creating Field
      | Title0               | Type1                       | Label2               | Description3               | Required4 | Default5                                | State6    | FieldGroup7   | Categorie8                | Access9 | Language10      | Note11                              | ShowTime12 | Options13               | Buttons14 | Hide15             | Width16 | Height17 | Rows18 | Cols19 | Thumbnailwidth20 | Maxwidth21 | Maxheight22 | Recursive23 | Multiple24 | Directory25       | Image_class26 | First27 | Last28 | Step29 | Preview30 | Home31 | Query32                                           | Schemes33 | Relative34 | Placeholder35 | Filter36 | leer37 | RenderClass38 | EditClass39 | Disabled40 | Readonly41 | Showon42 | AutomaticDisplay43 |
      | CalendarField_1      | Calendar (calendar)         | CalendarLabel_1      | CalendarDescription_1      | Yes       | 2017-01-01                              | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Calendarfield Note      | Yes        |                         |           |                    |         |          |        |        |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | CheckboxField_1      | Checkboxes (checkboxes)     | CheckboxLabel_1      | CheckboxDescription_1      | Yes       | Option2                                 | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Checkboxfield Note      |            | Option1,Option2,Option3 |           |                    |         |          |        |        |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | ColorField_1         | Colour (color)              | ColorLabel_1         | ColorDescription_1         | Yes       | #ff0000                                 | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Colorfield Note         |            |                         |           |                    |         |          |        |        |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | EditorField_1        | Editor (editor)             | EditorLabel_1        | EditorDescription_1        | Yes       | My default Text in the editor_1 field   | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Editorfield Note        |            |                         | Yes       | pagebreak,readmore | 50%     | 100px    |        |        |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | GalleryField_1       | Gallery (gallery)           | GalleryLabel_1       | GalleryDescription_1       | Yes       | parks                                   | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Galleryfield Note       |            |                         |           |                    |         |          |        |        | 50               | 200        | 200         | Yes         | Yes        | images/sampledata |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | IntegerField_1       | Integer (integer)           | IntegerLabel_1       | IntegerDescription_1       | Yes       | 15                                      | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Integerfield Note       |            |                         |           |                    |         |          |        |        |                  |            |             |             | Yes        |                   |               | 10      | 20     | 1      |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | list_1               | List (list)                 | ListLabel_1          | ListDescription_1          | Yes       | Option2                                 | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Listfield Note          |            | Option1,Option2,Option3 |           |                    |         |          |        |        |                  |            |             |             | Yes        |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | Imagelist_1          | List of Images (imagelist)  | ImagelistLabel_1     | ImagelistDescription_1     | Yes       |                                         | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Imagelistfield Note     |            |                         |           |                    |         |          |        |        |                  |            |             |             | Yes        | images/sampledata | imageclass    |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | MediaField_1         | Media (media)               | MediaLabel_1         | MediaDescription_1         | Yes       | images/joomla_black.png                 | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Mediafield Note         |            |                         |           |                    |         |          |        |        |                  |            |             |             |            | images/sampledata | imageclass    |         |        |        | Inline    | Yes    |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | RadioField_1         | Radio (radio)               | RadioLabel_1         | RadioDescription_1         | Yes       | Option2                                 | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Radiofield Note         |            | Option1,Option2,Option3 |           |                    |         |          |        |        |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | SQLField_1           | SQL (sql)                   | SQLLabel_1           | SQLDescription_1           | Yes       | 2                                       | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal SQLfield Note           |            |                         |           |                    |         |          |        |        |                  |            |             |             | Yes        |                   |               |         |        |        |           |        | select id as value, title as text from #__modules |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | TextField_1          | Text (text)                 | TextLabel_1          | TextDescription_1          | Yes       | My default Text in the text_1 field     | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Textfield Note          |            |                         |           |                    |         |          |        |        |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   | Raw      |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | TextareaField_1      | Text Area (textarea)        | TextareaLabel_1      | TextareaDescription_1      | Yes       | My default Text in the textarea_1 field | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Textareafield Note      |            |                         |           |                    |         |          | 20     | 40     |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | URLField_1           | Url (url)                   | URLLabel_1           | URLDescription_1           | Yes       | www.example.org                         | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal URLfield Note           |            |                         |           |                    |         |          |        |        |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   | HTTP      | Yes        | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | UserField_1          | User (user)                 | UserLabel_1          | UserDescription_1          | Yes       |                                         | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Userfield Note          |            |                         |           |                    |         |          |        |        |                  |            |             |             |            |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
      | UsergrouplistField_1 | User Groups (usergrouplist) | UsergrouplistLabel_1 | UsergrouplistDescription_1 | Yes       | 2                                       | Published | NewFieldGroup | Category_FieldGroupTest_1 | Public  | English (en-GB) | My personal Usergrouplistfield Note |            |                         |           |                    |         |          |        |        |                  |            |             |             | Yes        |                   |               |         |        |        |           |        |                                                   |           |            | Placeholder   |          |        | renderclass   | editclassc  | No         | No         | Both     | After Title        |
