<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Team
{
    public $id;
    public $title;
    public $text;
    public $picture;
    public $active;
    public $created;
    public $updated;
    public $user;

    public function Team($id = 0, $title = '', $text = '', $picture = '', $active = 0, $created = '', $updated = '', $user = 0) {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->picture = $picture;
        $this->active = $active;
        $this->created = $created;
        $this->updated = $updated;
        $this->user = $user;
    }
}
