<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:05
 */
class Profile
{
    protected $id;
    protected $name;
    protected $lastname;
    protected $emailaddress;
    protected $password;
    protected $birthday;
    protected $created;
    protected $updated;
    protected $loggedIn;
    protected $active;

    public function Profile($id = 0, $name = '', $lastname = '', $emailaddress = '', $password = '', $birthday = '', $created = '', $updated = '', $loggedIn = '', $active = 0) {
        $this->setId($id);
        $this->setName($name);
        $this->setLastname($lastname);
        $this->setEmailaddress($emailaddress);
        $this->setPassword($password);
        $this->setBirthday($birthday);
        $this->setCreated($created);
        $this->setUpdated($updated);
        $this->setLoggedIn($loggedIn);
        $this->setActive($active);
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setName($name) { $this->name = $name; }
    public function getName() { return $this->name; }

    public function setLastname($lastname) { $this->lastname = $lastname; }
    public function getLastname() { return $this->lastname; }

    public function setEmailaddress($emailaddress) { $this->emailaddress = $emailaddress; }
    public function getEmailaddress() { return $this->emailaddress; }

    public function setPassword($password) { $this->password = $password; }
    public function getPassword() { return $this->password; }

    public function setBirthday($birthday) { $this->birthday = $birthday; }
    public function getBirthday() { return $this->birthday; }

    public function setCreated($created) { $this->created = $created; }
    public function getCreated() { return $this->created; }

    public function setUpdated($updated) { $this->updated = $updated; }
    public function getUpdated() { return $this->updated; }

    public function setLoggedIn($loggedIn) { $this->loggedIn = $loggedIn; }
    public function getLoggedIn() { return $this->loggedIn; }

    public function setActive($active) { $this->active = $active; }
    public function getActive() { return $this->active; }
}
