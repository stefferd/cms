<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 27-12-12
 * Time: 18:19
 */
class CatItem
{
    public $id;
    public $title;
    public $text;
    public $active;
    public $created;
    public $updated;
    public $user;
    public $youtube;

    public function CatItem($id = 0, $title = '', $text = '', $active = 0, $created = '', $updated = '', $user = 0, $youtube = '') {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->active = $active;
        $this->created = $created;
        $this->updated = $updated;
        $this->user = $user;
        $this->youtube = $youtube;
    }
}
