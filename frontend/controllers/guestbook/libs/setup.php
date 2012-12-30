<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 19-6-12
 * Time: 21:53
 *
 */
 
class GuestbookSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(guestbook_controller . 'templates');
        $this->setCompileDir(guestbook_controller . 'templates_c');
        $this->setConfigDir(guestbook_controller . 'configs');
        $this->setCacheDir(guestbook_controller . 'cache');
    }
}
