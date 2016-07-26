<?php
namespace Page\Acceptance\Administrator;

use Page\Acceptance\Administrator\AdminPage;

class BannerPage extends AdminPage
{
    public static $url = "/administrator/index.php?option=com_banners";

    public static $titleField = ['id' => 'jform_name'];

    public static $aliasField = ['id' => 'jform_alias'];

    public static $searchField = ['id' => 'filter_search'];

    public static $searchButton = ['class' => 'icon-search'];

    public static $searchToolButton = ['css' => 'button[data-original-title="Filter the list items."]'];
}
