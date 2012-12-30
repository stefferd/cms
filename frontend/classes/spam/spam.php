<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 08-07-12
 * Time: 19:43
 */
class Spam
{
    protected $id;
    protected $ipaddress;
    protected $text;
    protected $created;

    public function Guestbook($id = 0, $ipaddress = '', $text = '', $created = '') {
        $this->setId($id);
        $this->setIpaddress($ipaddress);
        $this->setText($text);
        $this->setCreated($created);
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setIpaddress($ipaddress) { $this->ipaddress = $ipaddress; }
    public function getIpaddress() { return $this->ipaddress; }

    public function setText($text) { $this->text = $text; }
    public function getText() { return stripslashes($this->text); }

    public function setCreated($created) { $this->created = $created; }
    public function getCreated() { return $this->created; }
}
