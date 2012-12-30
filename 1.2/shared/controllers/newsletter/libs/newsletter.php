<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'newsletter/newsletter.php');
require(classes . 'newsletter/daonewsletter.php');

class NewsletterController {
    private $newsletter = null;
    private $daonewsletter = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new NewsletterSmarty();
        $this->newsletter = new Newsletter();
        $this->daonewsletter = new DaoNewsletter();
    }

    public function save($formvars = array(), $_FILES) {
        $document = NewsletterController::upload($_FILES);
        $this->newsletter->setTitle(trim($formvars['title']));
        if ($document) {
            $this->newsletter->setDocument($document);
        } else {
            $this->newsletter->setDocument('');
        }
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->newsletter->setActive($active);
        $this->newsletter->setUser($_SESSION['id']);

        $this->daonewsletter->save($this->newsletter);
    }

    public function update($formvars = array(), $_FILES, $id) {
        $document = NewsletterController::upload($_FILES);
        $this->newsletter->setTitle(trim($formvars['title']));
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        if ($document) {
            $this->newsletter->setDocument($document);
        } else {
            $this->newsletter->setDocument('');
        }
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

    private static function upload($_FILES) {
        $allowedExts = array("pdf", "doc", "docx");
        $extension = strtolower(end(explode(".", $_FILES["document"]["name"])));
        if (in_array($extension, $allowedExts)) {
            if ($_FILES["document"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["document"]["error"] . "<br />";
            }
            else
            {
                if (file_exists(url . theme . "user_documents/" . $_FILES["document"]["name"]))
                {
                    echo $_FILES["document"]["name"] . " already exists. ";
                }
                else
                {
                    if (move_uploaded_file($_FILES["document"]["tmp_name"], theme . "images/user_documents/" . str_replace(' ', '-', $_FILES["document"]["name"]))) {
                        return theme . 'images/user_documents/' . str_replace(' ', '-', $_FILES["document"]["name"]);
                    } else {
                        return false;
                    }
                }
            }
        } else { echo "Invalid file"; }
    }
}