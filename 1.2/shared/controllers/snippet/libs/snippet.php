<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'snippet/snippet.php');
require(classes . 'snippet/daosnippet.php');

class SnippetController {
    private $snippet = null;
    private $daosnippet = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new SnippetSmarty();
        $this->snippet = new Snippet();
        $this->daosnippet = new DaoSnippets();
    }

    public function save($formvars = array()) {
        $this->snippet->setUniqueid($this->prepareUniqueid(trim($formvars['title'])));
        $this->snippet->setTitle(trim($formvars['title']));
        $this->snippet->setText($formvars['text']);
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->snippet->setActive($active);

        $this->daosnippet->save($this->snippet);
    }

    public function update($formvars = array(), $id) {
        $this->snippet->setUniqueid($this->prepareUniqueid(trim($formvars['title'])));
        $this->snippet->setTitle(trim($formvars['title']));
        $this->snippet->setText($formvars['text']);
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->snippet->setActive($active);
        $this->snippet->setId($id);

        $this->daosnippet->update($this->snippet);
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->daosnippet->delete($id);
    }

    public function create($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('form.tpl');
    }

    public function edit($formvars = array(), $id) {
        $this->daosnippet->get($this->snippet, $id);
        $this->tpl->assign('post', $formvars);
        $this->tpl->assignByRef('snippet', $this->snippet);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('edit.tpl');
    }

    public function getEntries() {
        return $this->daosnippet->getEntries();
    }

    public function getByUniqueid($uniqueid) {
        $this->daosnippet->getByUniqueid($this->snippet, $uniqueid);
        return $this->snippet->getText();
    }

    private function prepareUniqueid($title) {
        $title = strtolower($title);
        $title = str_replace(' '  , '-', $title);
        $title = str_replace('\'' , '' , $title);
        $title = str_replace('"'  , '' , $title);
        $title = str_replace('/'  , '' , $title);
        $title = str_replace('\\' , '' , $title);
        
        return $title;
    }
}