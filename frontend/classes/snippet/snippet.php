<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Snippet
{
    protected $id;
    protected $uniqueid;
    protected $title;
    protected $text;
    protected $active;
    protected $created;
    protected $updated;
    protected $user;
    protected $version;

    public function Snippet($id = 0, $uniqueid = '', $title = '', $text = '', $active = 0, $created = '', $updated = '', $user = 0, $version = 1) {
        $this->setId($id);
        $this->setUniqueid($uniqueid);
        $this->setTitle($title);
        $this->setText($text);
        $this->setActive($active);
        $this->setCreated($created);
        $this->setUpdated($updated);
        $this->setUser($user);
        $this->setVersion($version);
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setUniqueid($uniqueid) { $this->uniqueid = $uniqueid; }
    public function getUniqueid() { return $this->uniqueid; }

    public function setTitle($title) { $this->title = $title; }
    public function getTitle() { return $this->title; }

    public function setText($text) { $this->text = $text; }
    public function getText() { return stripslashes($this->text); }

    public function setActive($active) { $this->active = $active; }
    public function getActive() { return $this->active; }

    public function setCreated($created) { $this->created = $created; }
    public function getCreated() { return $this->created; }

    public function setUpdated($updated) { $this->updated = $updated; }
    public function getUpdated() { return $this->updated; }

    public function setUser($user) { $this->user = $user; }
    public function getUser() { return $this->user; }

    public function setVersion($version) { $this->version = $version; }
    public function getVersion() { return $this->version; }
}
