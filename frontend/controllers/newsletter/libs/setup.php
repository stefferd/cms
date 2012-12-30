<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 19-6-12
 * Time: 21:53
 *
 */
 
class NewsletterSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(newsletter_controller . 'templates');
        $this->setCompileDir(newsletter_controller . 'templates_c');
        $this->setConfigDir(newsletter_controller . 'configs');
        $this->setCacheDir(newsletter_controller . 'cache');
    }
}
