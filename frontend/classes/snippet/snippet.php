<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Snippet
{
    public $id;
    public $uniqueid;
    public $title;
    public $text;
    public $active;
    public $created;
    public $updated;
    public $user;
    public $version;

    public function Snippet($id = 0, $uniqueid = '', $title = '', $text = '', $active = 0, $created = '', $updated = '', $user = 0, $version = 1) {
        $this->id = $id;
        $this->uniqueid = $uniqueid;
        $this->title = $title;
        $this->text = $text;
        $this->active = $active;
        $this->created = $created;
        $this->updated = $updated;
        $this->user = $user;
        $this->version = $version;
    }
}
