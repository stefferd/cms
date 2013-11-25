<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 28-12-12
 * Time: 00:18
 */

require(classes . 'notes/note.php');
require(classes . 'notes/daonote.php');

class NotesController {
    private $note = null;
    private $daonote = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new NoteSmarty();
        $this->note = new Note();
        $this->daonote = new DaoNote();
    }

    public function save($post = array()) {
        /*
            Save the catalog item, the variables are as follow:

            $post:      The values of the completed form
        */
        $this->note->setName($post['name']);
        $this->note->setEmail($post['email']);
        $this->note->setText($post['text']);
        $this->note->setCatalog($post['catalog']);
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->note->setActive($active);
        $this->note->setUser($_SESSION['id']);

        return $this->daonote->save($this->note);
    }

    public function update($post = array(), $id) {
        /*
            Save the catalog item, the variables are as follow:

            $post:      The values of the completed form
        */

        $this->note->setName($post['name']);
        $this->note->setEmail($post['email']);
        $this->note->setText($post['text']);
        $this->note->setCatalog($post['catalog']);
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->note->setActive($active);
        $this->note->setId($id);

        return $this->daonote->update($this->note);
    }

    public function create($post = array(), $catalog) {
        /*
            Show the creation form, the variable are as follow:

            $post:  The post values of the not completed form
            $type:  The type of catalog item to create
        */
        $this->note->setCatalog($catalog);
        $car = new Car();
        $daocatalog = new DaoCatalog();
        $daocatalog->get($car, $catalog);
        $this->tpl->assignByRef('car', $car);
        $this->tpl->assignByRef('item', $this->note);
        $this->tpl->assignByRef('post', $post);
        $this->tpl->display('form.tpl');
    }

    public function edit($post = array(), $id) {
        /*
            Show the creation form, the variable are as follow:

            $post:  The post values of the not completed form
            $type:  The type of catalog item to create
        */
        $this->daonote->get($this->note, $id);
        $car = new Car();
        $daocatalog = new DaoCatalog();
        $daocatalog->get($car, $this->note->getCatalog());
        $this->tpl->assignByRef('car', $car);
        $this->tpl->assignByRef('item', $this->note);
        $this->tpl->assignByRef('post', $post);
        $this->tpl->display('form.tpl');
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->daonote->delete($id);
    }

    public function getEntries() {
        return $this->daonote->getEntries();
    }
}