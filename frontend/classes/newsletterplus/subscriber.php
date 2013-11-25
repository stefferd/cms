<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Subscriber
{
    public $id;
    public $name;
    public $email;
    public $active;
    public $created;
    public $updated;
    public $user;

    public function Subscriber($id = 0, $name = '', $email = '', $active = 0, $created = '', $updated = '', $user = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->active = $active;
        $this->created = $created;
        $this->updated = $updated;
        $this->user = $user;
    }
}
