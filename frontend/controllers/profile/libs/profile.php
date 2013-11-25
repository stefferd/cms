<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 * To change this template use File | Settings | File Templates.
 */
require(classes . 'profile/profile.php');
require(classes . 'profile/daoprofile.php');

class ProfileController {
    private $profile = null;
    private $daoprofile = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new ProfileSmarty();
        $this->profile = new Profile();
        $this->daoprofile = new DaoProfile();

    }
}