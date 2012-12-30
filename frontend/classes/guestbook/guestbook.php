<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Guestbook
{
    protected $id;
    protected $title;
    protected $text;
    protected $active;
    protected $created;

    public function Guestbook($id = 0, $title = '', $text = '', $active = 0, $created = '') {
        $this->setId($id);
        $this->setTitle($title);
        $this->setText($text);
        $this->setActive($active);
        $this->setCreated($created);
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setTitle($title) { $this->title = $title; }
    public function getTitle() { return $this->title; }

    public function setText($text) { $this->text = $text; }
    public function getText() { return stripslashes($this->text); }

    public function setActive($active) { $this->active = $active; }
    public function getActive() { return $this->active; }

    public function setCreated($created) { $this->created = $created; }
    public function getCreated() { return $this->created; }
}
