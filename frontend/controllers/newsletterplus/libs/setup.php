<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 19-6-12
 * Time: 21:53
 *
 */
 
class NewsletterPlusSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(newsletterplus_controller . 'templates');
        $this->setCompileDir(newsletterplus_controller . 'templates_c');
        $this->setConfigDir(newsletterplus_controller . 'configs');
        $this->setCacheDir(newsletterplus_controller . 'cache');
    }
}
