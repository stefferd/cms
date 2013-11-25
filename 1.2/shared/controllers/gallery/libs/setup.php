<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 27-12-12
 * Time: 19:55
 *
 */
 
class SGallery extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(gallery_controller . 'templates');
        $this->setCompileDir(gallery_controller . 'templates_c');
        $this->setConfigDir(gallery_controller . 'configs');
        $this->setCacheDir(gallery_controller . 'cache');
    }
}
