<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Spam
{
    public $id;
    public $ipaddress;
    public $text;
    public $created;

    public function Guestbook($id = 0, $ipaddress = '', $text = '', $created = '') {
        $this->id = $id;
        $this->ipaddress = $ipaddress;
        $this->text = $text;
        $this->created = $created;
    }
}
