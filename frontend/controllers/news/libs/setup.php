<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 19-6-12
 * Time: 21:53
 *
 */
 
class NewsSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(news_controller . 'templates');
        $this->setCompileDir(news_controller . 'templates_c');
        $this->setConfigDir(news_controller . 'configs');
        $this->setCacheDir(news_controller . 'cache');
    }
}
