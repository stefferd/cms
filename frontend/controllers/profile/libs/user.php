<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 * To change this template use File | Settings | File Templates.
 */

class UserController {
    private $profile = null;
    private $daoprofile = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new ProfileSmarty();
        $this->profile = new Profile();
        $this->daoprofile = new DaoProfile();

    }
    public function create($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('form.tpl');
    }
    public function save($formvars = array()) {
        $this->profile->setName($formvars['name']);
        $this->profile->setLastname($formvars['lastname']);
        $this->profile->setActive(1);
        $this->profile->setEmailaddress($formvars['email']);
        $this->profile->setPassword(md5($formvars['password']));
        $birthday = strtotime($formvars['birthdayMonth'] . '/' . $formvars['birthdayDay'] . '/' . $formvars['birthdayYear']);
        $this->profile->setBirthday($birthday);

        $this->daoprofile->create($this->profile);
        echo 'Gebruikersnaam :' . $this->profile->getEmailaddress() . '<br />Wachtwoord : ' . $formvars['password'] . '<br />';
    }
    public function edit($formvars = array(), $id) {
        $this->daoprofile->get($this->profile, $id);
        $this->tpl->assign('post', $formvars);
        $this->tpl->assignByRef('profile', $this->profile);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('edit.tpl');
    }
    public function update($formvars = array(), $id) {
        $this->daoprofile->get($this->profile, $id);
        $this->profile->setName($formvars['name']);
        $this->profile->setLastname($formvars['lastname']);
        $this->profile->setEmailaddress($formvars['email']);

        $this->daoprofile->save($this->profile);
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function getEntries() {
        return $this->daoprofile->getEntries();
    }

    public function delete($id) {
        return $this->daoprofile->delete($id);
    }

}