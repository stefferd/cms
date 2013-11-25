<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 27-12-12
 * Time: 19:55
 *
 */
 
class NoteSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(note_controller . 'templates');
        $this->setCompileDir(note_controller . 'templates_c');
        $this->setConfigDir(note_controller . 'configs');
        $this->setCacheDir(note_controller . 'cache');
    }
}
