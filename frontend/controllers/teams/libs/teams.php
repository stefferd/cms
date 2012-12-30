<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'teams/team.php');
require(classes . 'teams/daoteam.php');

class TeamController {
    private $teams = null;
    private $daoteams = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new TeamsSmarty();
        $this->teams = new Team();
        $this->daoteams = new DaoTeam();
    }

    public function save($formvars = array(), $_FILES) {
        $picture = TeamController::upload($_FILES);
        $this->teams->setTitle(trim($formvars['title']));
        $this->teams->setText($formvars['text']);
        if ($picture) {
            $this->teams->setPicture($picture);
        } else {
            $this->teams->setPicture('');
        }
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->teams->setActive($active);
        $this->teams->setUser($_SESSION['id']);

        $this->daoteams->save($this->teams);
    }

    public function update($formvars = array(), $id) {
        $this->teams->setTitle(trim($formvars['title']));
        $this->teams->setText($formvars['text']);
        $active = ($formvars['active'] == 'on') ? 1 : 0;
        $this->teams->setActive($active);
        $this->teams->setId($id);

        $this->daoteams->update($this->teams);
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->daoteams->delete($id);
    }

    public function create($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('form.tpl');
    }

    public function edit($formvars = array(), $id) {
        $this->daoteams->get($this->teams, $id);
        $this->tpl->assign('post', $formvars);
        $this->tpl->assignByRef('teams', $this->teams);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('edit.tpl');
    }

    public function getEntries() {
        return $this->daoteams->getEntries();
    }

    private static function upload($_FILES) {
        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $extension = strtolower(end(explode(".", $_FILES["picture"]["name"])));
        if ((($_FILES["picture"]["type"] == "image/gif")
            || ($_FILES["picture"]["type"] == "image/jpeg")
            || ($_FILES["picture"]["type"] == "image/pjpeg"))
            && ($_FILES["picture"]["size"] < 60000)
            && in_array($extension, $allowedExts))
        {
            if ($_FILES["picture"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["picture"]["error"] . "<br />";
            }
            else
            {
                echo "Upload: " . $_FILES["picture"]["name"] . "<br />";
                echo "Type: " . $_FILES["picture"]["type"] . "<br />";
                echo "Size: " . ($_FILES["picture"]["size"] / 1024) . " Kb<br />";
                echo "Temp file: " . $_FILES["picture"]["tmp_name"] . "<br />";

                if (file_exists(url . theme . "user_image/" . $_FILES["picture"]["name"]))
                {
                    echo $_FILES["picture"]["name"] . " already exists. ";
                }
                else
                {
                    if (move_uploaded_file($_FILES["picture"]["tmp_name"], theme . "images/user_image/" . $_FILES["picture"]["name"])) {
                        return theme . 'images/user_image/' . $_FILES["picture"]["name"];
                    } else {
                        return false;
                    }
                }
            }
        } else { echo "Invalid file"; }
    }
}