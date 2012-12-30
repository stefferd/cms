<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Team
{
    protected $id;
    protected $title;
    protected $text;
    protected $picture;
    protected $active;
    protected $created;
    protected $updated;
    protected $user;

    public function Team($id = 0, $title = '', $text = '', $picture = '', $active = 0, $created = '', $updated = '', $user = 0) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setText($text);
        $this->setPicture($picture);
        $this->setActive($active);
        $this->setCreated($created);
        $this->setUpdated($updated);
        $this->setUser($user);
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setTitle($title) { $this->title = $title; }
    public function getTitle() { return $this->title; }

    public function setText($text) { $this->text = $text; }
    public function getText() { return stripslashes($this->text); }

    public function setPicture($picture) { $this->picture = $picture; }
    public function getPicture() { return stripslashes($this->picture); }

    public function setActive($active) { $this->active = $active; }
    public function getActive() { return $this->active; }

    public function setCreated($created) { $this->created = $created; }
    public function getCreated() { return $this->created; }

    public function setUpdated($updated) { $this->updated = $updated; }
    public function getUpdated() { return $this->updated; }

    public function setUser($user) { $this->user = $user; }
    public function getUser() { return $this->user; }
}
