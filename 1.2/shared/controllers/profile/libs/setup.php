<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 19-6-12
 * Time: 21:53
 *
 */
 
class ProfileSmarty extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setTemplateDir(profile_controller . 'templates');
        $this->setCompileDir(profile_controller . 'templates_c');
        $this->setConfigDir(profile_controller . 'configs');
        $this->setCacheDir(profile_controller . 'cache');
    }
}
