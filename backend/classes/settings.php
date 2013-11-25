<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 09-04-12
 * Time: 11:38
 */

define('host', 'localhost');
define('username', 'deb33946_shapes');
define('password', 'Shap1919');
define('database', 'deb33946_shapesshadows');

//define('url', 'http://localhost/de-stijlert/');
define('url', 'http://www.mmcms.net/shapesandshadows/');
define('theme', 'theme/default/');
define('version', '1.2');

define('classes', '../' . version . '/shared/classes/');
define('controllers', '../' . version . '/shared/controllers/');
define('smarty_dir', '../' . version . '/shared/libs/smarty/');

define('general_controllers', '../' . version . '/shared/controllers/general/');

define('profile_class', classes . 'profile/');
define('profile_controller', '../' . version . '/shared/controllers/profile/');

define('pages_class', classes . 'pages/');
define('pages_controller', '../' . version . '/shared/controllers/pages/');

define('snippet_class', classes . 'snippet/');
define('snippet_controller', '../' . version . '/shared/controllers/snippet/');

define('teams_class', classes . 'teams/');
define('teams_controller', '../' . version . '/shared/controllers/teams/');

define('news_class', classes . 'news/');
define('news_controller', '../' . version . '/shared/controllers/news/');

define('newsletter_class', classes . 'newsletter/');
define('newsletter_controller', '../' . version . '/shared/controllers/newsletter/');

define('newsletterplus_class', classes . 'newsletterplus/');
define('newsletterplus_controller', '../' . version . '/shared/controllers/newsletterplus/');

define('catalog_class', classes . 'catalog/');
define('catalog_controller', '../' . version . '/shared/controllers/catalog/');

define('note_class', classes . 'notes/');
define('note_controller', '../' . version . '/shared/controllers/notes/');

if (!isset($_SESSION['imagemanager.filesystem.rootpath']))
{
    $_SESSION['imagemanager.filesystem.rootpath'] = '/home/deb33946/domains/mmcms.net/public_html/cw/images/';
}

class Rights {

    const users = true;
    const pages = true;
    const snippets = false;
    const teams = false;
    const catalog = false;
    const news = false;
    const newsletterBasic = false;
    const newsletterPlus = false;
    const notes = false;

}
