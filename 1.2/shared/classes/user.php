<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 09-04-12
 * Time: 12:24
 */
require_once('libs/swarm/settings.php');

class User {
    protected $id;
    protected $username;
    protected $password;
    protected $name;
    protected $lastname;
    protected $loggedin;
    protected $birthday;
    protected $level;
    protected $active;
    protected $profile;

    public function User($id = 0, $username = '', $password = '', $name = '', $lastname = '', $birthday = '', $level = 1, $active = 0, $profile = 0) {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setName($name);
        $this->setLastname($lastname);
        $this->setBirthday($birthday);
        $this->setLevel($level);
        $this->setId($id);
        $this->setActive($active);
        $this->setProfile($profile);
    }

    public function setUsername($username) { $this->username = $username; }
    public function getUsername() { return $this->username; }

    public function setPassword($password) { $this->password = $password; }
    public function getPassword() { return $this->password; }

    public function setName($name) { $this->name = $name; }
    public function getName() { return $this->name; }

    public function setLastname($lastname) { $this->lastname = $lastname; }
    public function getLastname() { return $this->lastname; }

    public function setLoggedIn($loggedin) { $this->loggedin = $loggedin; }
    public function getLoggedIn() { return $this->loggedin; }

    public function setBirthday($birthday) { $this->birthday = $birthday; }
    public function getBirthday() { return $this->birthday; }

    public function setLevel($level) { $this->level = $level; }
    public function getLevel() { return $this->level; }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setActive($active) { $this->active = $active; }
    public function getActive() { return $this->active; }

    public function setProfile($profile) { $this->profile = $profile; }
    public function getProfile() { return $this->profile; }
}
