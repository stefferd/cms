<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 19-6-12
 * Time: 21:53
 *
 */
 
class SnippetSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(snippet_controller . 'templates');
        $this->setCompileDir(snippet_controller . 'templates_c');
        $this->setConfigDir(snippet_controller . 'configs');
        $this->setCacheDir(snippet_controller . 'cache');
    }
}
