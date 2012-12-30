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

    public function save() {
        $this->daoguestbook->save($this->guestbook);
    }

    public function update($formvars = array(), $id) {
        $this->guestbook->setTitle(trim($formvars['title']));
        $this->guestbook->setText($formvars['text']);;
        $this->guestbook->setActive(1);
        $this->guestbook->setId($id);

        $this->daoguestbook->update($this->guestbook);
    }

    public function view() {
        $this->tpl->assignByRef('daoguestbook', $this->daoguestbook);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->daoguestbook->delete($id);
    }

    public function create($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('form.tpl');
    }

    public function edit($formvars = array(), $id) {
        $this->daoguestbook->get($this->guestbook, $id);
        $this->tpl->assign('post', $formvars);
        $this->tpl->assignByRef('guestbook', $this->guestbook);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('edit.tpl');
    }

    public function getEntries() {
        return $this->daoguestbook->getEntries();
    }
}