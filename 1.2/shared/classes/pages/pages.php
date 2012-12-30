<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Pages
{
    protected $id;
    protected $uniqueid;
    protected $title;
    protected $text;
    protected $metatitle;
    protected $metadescription;
    protected $keywords;
    protected $active;
    protected $created;
    protected $updated;
    protected $user;
    protected $version;
    protected $parent;

    public function Pages($id = 0, $uniqueid = '', $title = '', $text = '', $metatitle = '', $metadescription = '', $keywords = '',$active = 0, $created = '', $updated = '', $user = 0, $version = 1, $parent = 0) {
        $this->setId($id);
        $this->setUniqueid($uniqueid);
        $this->setTitle($title);
        $this->setText($text);
        $this->setMetatitle($metatitle);
        $this->setMetadescription($metadescription);
        $this->setKeywords($keywords);
        $this->setActive($active);
        $this->setCreated($created);
        $this->setUpdated($updated);
        $this->setUser($user);
        $this->setVersion($version);
        $this->setParent($parent);
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setUniqueid($uniqueid) { $this->uniqueid = $uniqueid; }
    public function getUniqueid() { return $this->uniqueid; }

    public function setTitle($title) { $this->title = $title; }
    public function getTitle() { return $this->title; }

    public function setText($text) { $this->text = $text; }
    public function getText() { return stripslashes($this->text); }

    public function setMetatitle($metatitle) { $this->metatitle = $metatitle; }
    public function getMetatitle() { return $this->metatitle; }

    public function setMetadescription($metadescription) { $this->metadescription = $metadescription; }
    public function getMetadescription() { return $this->metadescription; }

    public function setKeywords($keywords) { $this->keywords = $keywords; }
    public function getKeywords() { return $this->keywords; }

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

    public function setParent($parent) { $this->parent = $parent; }
    public function getParent() { return $this->parent; }
}
