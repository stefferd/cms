<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 27-12-12
 * Time: 18:19
 */
class Note
{
    protected $id;
    protected $name;
    protected $text;
    protected $email;
    protected $active;
    protected $created;
    protected $updated;
    protected $user;
    protected $catalog;

    public function Note($id = 0, $name = '', $text = '', $email = '', $active = 0, $created = '', $updated = '', $user = 0, $catalog = 0) {
        $this->setId($id);
        $this->setName($name);
        $this->setText($text);
        $this->setEmail($email);
        $this->setActive($active);
        $this->setCreated($created);
        $this->setUpdated($updated);
        $this->setUser($user);
        $this->setCatalog($catalog);
    }

    public function setId($id) { $this->id = $id; }
    public function &getId() { return $this->id; }

    public function setName($name) { $this->name = $name; }
    public function &getName() { return $this->name; }

    public function setText($text) { $this->text = $text; }
    public function &getText() { return stripslashes($this->text); }

    public function setActive($active) { $this->active = $active; }
    public function &getActive() { return $this->active; }

    public function setCreated($created) { $this->created = $created; }
    public function &getCreated() { return $this->created; }

    public function setUpdated($updated) { $this->updated = $updated; }
    public function &getUpdated() { return $this->updated; }

    public function setUser($user) { $this->user = $user; }
    public function &getUser() { return $this->user; }

    public function setEmail($email){ $this->email = $email; }
    public function &getEmail() { return $this->email; }

    public function setCatalog($catalog) { $this->catalog = $catalog; }
    public function &getCatalog() { return $this->catalog; }
}
