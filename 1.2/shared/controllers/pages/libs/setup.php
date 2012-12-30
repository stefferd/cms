<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 19-6-12
 * Time: 21:53
 *
 */
 
class PagesSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(pages_controller . 'templates');
        $this->setCompileDir(pages_controller . 'templates_c');
        $this->setConfigDir(pages_controller . 'configs');
        $this->setCacheDir(pages_controller . 'cache');
    }
}
