<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Newsletter
{
    public $id;
    public $title;
    public $text;
    public $document;
    public $active;
    public $created;
    public $updated;
    public $user;

    public function Newsletter($id = 0, $title = '', $text = '', $document = '', $active = 0, $created = '', $updated = '', $user = 0) {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->document = $document;
        $this->active = $active;
        $this->created = $created;
        $this->updated = $updated;
        $this->user = $user;
    }
}
