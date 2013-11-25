<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 27-12-12
 * Time: 19:55
 *
 */
 
class CatalogSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(catalog_controller . 'templates');
        $this->setCompileDir(catalog_controller . 'templates_c');
        $this->setConfigDir(catalog_controller . 'configs');
        $this->setCacheDir(catalog_controller . 'cache');
    }
}
