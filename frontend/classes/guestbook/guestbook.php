<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Guestbook
{
    public $id;
    public $title;
    public $text;
    public $active;
    public $created;

    public function Guestbook($id = 0, $title = '', $text = '', $active = 0, $created = '') {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->active = $active;
        $this->created = $created;
    }
}
