<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 19-6-12
 * Time: 21:53
 *
 */
 
class TeamsSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(teams_controller . 'templates');
        $this->setCompileDir(teams_controller . 'templates_c');
        $this->setConfigDir(teams_controller . 'configs');
        $this->setCacheDir(teams_controller . 'cache');
    }
}
