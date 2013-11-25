<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 09-04-12
 * Time: 11:38
 */
define('host', 'localhost');
define('username', 'deb33946_cmsadm');
define('password', '@dmin1608');
define('database', 'deb33946_cms11');

//define('url', 'http://www.internationalkartparts.nl/');
define('url', 'http://mmcms.net/1.1/frontend/');
define('theme', 'theme/default/');
define('version', '1.1');

define('classes', '../shared/classes/');
define('controllers', '../shared/controllers/');
define('smarty_dir', '../shared/libs/smarty/');

define('general_controllers', '../shared/controllers/general/');

define('profile_class', classes . 'profile/');
define('profile_controller', '../shared/controllers/profile/');

define('pages_class', classes . 'pages/');
define('pages_controller', '../shared/controllers/pages/');

define('snippet_class', classes . 'snippet/');
define('snippet_controller', '../shared/controllers/snippet/');