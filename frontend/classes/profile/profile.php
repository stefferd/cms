<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:05
 */
class Profile
{
    public $id;
    public $name;
    public $lastname;
    public $emailaddress;
    public $password;
    public $birthday;
    public $created;
    public $updated;
    public $loggedIn;
    public $active;

    public function Profile($id = 0, $name = '', $lastname = '', $emailaddress = '', $password = '', $birthday = '', $created = '', $updated = '', $loggedIn = '', $active = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->emailaddress = $emailaddress;
        $this->password = $password;
        $this->birthday = $birthday;
        $this->created = $created;
        $this->updated = $updated;
        $this->loggedIn = $loggedIn;
        $this->active = $active;
    }
}
