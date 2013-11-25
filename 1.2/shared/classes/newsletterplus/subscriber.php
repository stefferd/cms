<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Subscriber
{
    protected $id;
    protected $name;
    protected $email;
    protected $active;
    protected $created;
    protected $updated;
    protected $user;

    public function Subscriber($id = 0, $name = '', $email = '', $active = 0, $created = '', $updated = '', $user = 0) {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setActive($active);
        $this->setCreated($created);
        $this->setUpdated($updated);
        $this->setUser($user);
    }

    public function setId($id) { $this->id = $id; }
    public function &getId() { return $this->id; }

    public function setName($name) { $this->name = $name; }
    public function &getName() { return $this->name; }

    public function setEmail($email) { $this->email = $email; }
    public function &getEmail() { return $this->email; }

    public function setActive($active) { $this->active = $active; }
    public function &getActive() { return $this->active; }

    public function setCreated($created) { $this->created = $created; }
    public function &getCreated() { return $this->created; }

    public function setUpdated($updated) { $this->updated = $updated; }
    public function &getUpdated() { return $this->updated; }

    public function setUser($user) { $this->user = $user; }
    public function &getUser() { return $this->user; }
}
