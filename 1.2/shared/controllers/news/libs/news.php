<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'news/news.php');
require(classes . 'news/daonews.php');

class NewsController {
    public $news = null;
    public $daonews = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new NewsSmarty();
        $this->news = new News();
        $this->daonews = new DaoNews();
    }

    public function save($formvars = array()) {
        $this->news->setTitle(trim($formvars['title']));
        $this->news->setText($formvars['text']);
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->news->setActive($active);

        $this->daonews->save($this->news);
    }

    public function update($formvars = array(), $id) {
        $this->news->setTitle(trim($formvars['title']));
        $this->news->setText($formvars['text']);;
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->news->setActive($active);
        $this->news->setId($id);

        $this->daonews->update($this->news);
    }

    public function view() {
        $this->tpl->assignByRef('daonews', $this->daonews);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->daonews->delete($id);
    }

    public function create($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('form.tpl');
    }

    public function edit($formvars = array(), $id) {
        $this->daonews->get($this->news, $id);
        $this->tpl->assign('post', $formvars);
        $this->tpl->assignByRef('news', $this->news);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('edit.tpl');
    }

    public function getEntries() {
        return $this->daonews->getEntries();
    }
}