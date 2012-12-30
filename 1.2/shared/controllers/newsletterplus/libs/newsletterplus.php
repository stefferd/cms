<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'newsletterplus/newsletterplus.php');
require(classes . 'newsletterplus/daonewsletterplus.php');

class NewsletterPlusController {
    private $newsletter = null;
    private $daonewsletter = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new NewsletterPlusSmarty();
        $this->newsletter = new Newsletter();
        $this->daonewsletter = new DaoNewsletter();
    }

    public function save($formvars = array(), $_FILES) {
        $this->newsletter->setTitle(trim($formvars['title']));
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->newsletter->setActive($active);
        $this->newsletter->setUser($_SESSION['id']);

        $this->daonewsletter->save($this->newsletter);
    }

    public function update($formvars = array(), $_FILES, $id) {
        $this->newsletter->setTitle(trim($formvars['title']));
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->newsletter->setActive($active);
        $this->newsletter->setId($id);

        $this->daonewsletter->update($this->newsletter);
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->daonewsletter->delete($id);
    }

    public function create($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('form.tpl');
    }

    public function edit($formvars = array(), $id) {
        $this->daonewsletter->get($this->newsletter, $id);
        $this->tpl->assign('post', $formvars);
        $this->tpl->assignByRef('newsletter', $this->newsletter);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('edit.tpl');
    }

    public function getEntries() {
        return $this->daonewsletter->getEntries();
    }
}