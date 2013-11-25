<?php
    /*
     * Author: Stef van den Berg
     * Updated on: 19-06-2012
     * index page of the CMS 1.1 project
     */
    session_start();

    include('./classes/settings.php');
    include(smarty_dir . 'Smarty.class.php');
    include(profile_controller . 'libs/setup.php');
    include(profile_controller . 'libs/profile.php');
    include(profile_controller . 'libs/user.php');
    include(pages_controller . 'libs/setup.php');
    include(pages_controller . 'libs/pages.php');
    include(snippet_controller . 'libs/setup.php');
    include(snippet_controller . 'libs/snippet.php');
    include(teams_controller . 'libs/setup.php');
    include(teams_controller . 'libs/teams.php');
    include(news_controller . 'libs/setup.php');
    include(news_controller . 'libs/news.php');
    include(newsletter_controller . 'libs/setup.php');
    include(newsletter_controller . 'libs/newsletter.php');
    include(catalog_controller . 'libs/setup.php');
    include(catalog_controller . 'libs/catalog.php');

    //Get the querystring attributes
    $_module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'start';
    $_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';
    $_item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';

    switch($_module) {
        case 'catalog':
            $ccatalog = new CatalogController();
            switch($_action) {
                case 'get-images':
                    $count = 1;
                    $items = $ccatalog->getImages($_item);
                    foreach ($items as $item) {
                        if (strlen(strstr($item, 'cache')) == 0 && strlen(strstr($item, 'thumb')) == 0) {
                            echo $item;
                            if (count($items) != 1) {
                                if ($count != (count($items)-1)) {
                                    echo ',';
                                }
                            }
                            $count++;
                        }
                    }
                    break;
                case 'get-first-image':
                    echo $ccatalog->getMainimage($_item);
                    break;
                case 'search-cars':
                    echo $ccatalog->getCars($_POST['brand'], $_POST['type'], $_POST['price']);
                    break;
                case 'get-types':
                    $count = 1;
                    $items = $ccatalog->getTypes($_item);
                    $total = count($items);
                    foreach ($items as $item) {
                        echo $item;
                        if ($count != $total) {
                            echo ',';
                        }
                        $count++;
                    }
                    break;
            }
            break;
    }
?>