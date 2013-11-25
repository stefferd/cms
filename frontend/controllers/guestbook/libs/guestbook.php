<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'guestbook/guestbook.php');
require(classes . 'guestbook/daoguestbook.php');

class GuestbookController {
    public $guestbook = null;
    public $daoguestbook = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new GuestbookSmarty();
        $this->guestbook = new Guestbook();
        $this->daoguestbook = new DaoGuestbook();
    }

    public function getEntries() {
        return $this->daoguestbook->getEntries();
    }
}