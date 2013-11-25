<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 09-04-12
 * Time: 11:38
 */
define('host', '195.211.72.9');
define('username', 'deb33946_cwad');
define('password', 'Cl@s201212271632');
define('database', 'deb33946_cw');

define('cms', 'http://www.mmcms.net/cw/');
define('controllers', 'controllers/');
/*define('url', 'http://www.mmcms.net/cw-website/');*/
define('url', 'http://www.classics-world.com/');
if (!defined('root')) { define('root', '//home74b/sub002/sc42553-XVBT/classics-world.com/'); }
define('theme', 'theme/default/');
define('version', '1.2');

define('classes', 'classes/');
define('smarty_dir', 'libs/smarty/');

define('general_controllers', controllers . 'general/');

define('profile_class', classes . 'profile/');
define('profile_controller', controllers . 'profile/');

define('pages_class', classes . 'pages/');
define('pages_controller', controllers . 'pages/');

define('snippet_class', classes . 'snippet/');
define('snippet_controller', controllers . 'snippet/');

define('teams_class', classes . 'teams/');
define('teams_controller', controllers . 'teams/');

define('news_class', classes . 'news/');
define('news_controller', controllers . 'news/');

define('newsletter_class', classes . 'newsletter/');
define('newsletter_controller', controllers . 'newsletter/');

define('guestbook_class', classes . 'guestbook/');
define('guestbook_controller', controllers . 'guestbook/');

define('spam_class', classes . 'spam/');
define('spam_controller', controllers . 'spam/');

define('catalog_class', classes . 'catalog/');
define('catalog_controller', controllers . 'catalog/');

define('newsletterplus_class', classes . 'newsletterplus/');
define('newsletterplus_controller', controllers . 'newsletterplus/');

// Get the root execute this line
//echo $_SERVER['DOCUMENT_ROOT'];