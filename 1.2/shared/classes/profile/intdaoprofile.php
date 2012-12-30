<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once('classes/settings.php');
require_once(classes. '/profile/profile.php');

interface IntDaoProfile
{
    public function create(Profile $profile);
    public function save(Profile $profile);
    public function get(Profile $profile, $id);
    public function getEntries();
    public function login(Profile $profile, $emailaddress, $password);
}
