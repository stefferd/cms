<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Pages
{
    public $id;
    public $uniqueid;
    public $title;
    public $text;
    public $metatitle;
    public $metadescription;
    public $keywords;
    public $active;
    public $created;
    public $updated;
    public $user;
    public $version;
    public $parent;

    public function Pages($id = 0, $uniqueid = '', $title = '', $text = '', $metatitle = '', $metadescription = '', $keywords = '',$active = 0, $created = '', $updated = '', $user = 0, $version = 1, $parent = 0) {
        $this->id = $id;
        $this->uniqueid = $uniqueid;
        $this->title = $title;
        $this->text = $text;
        $this->metatitle = $metatitle;
        $this->metadescription = $metadescription;
        $this->keywords = $keywords;
        $this->active = $active;
        $this->created = $created;
        $this->updated = $updated;
        $this->user = $user;
        $this->version = $version;
        $this->parent = $parent;
    }
}
