<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 * To change this template use File | Settings | File Templates.
 */
require(classes . 'profile/profile.php');
require(classes . 'profile/daoprofile.php');

class ProfileController {
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

    public function login($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('login.tpl');
    }

    public function logout() {
        $_SESSION['username'] = '';
        $_SESSION['id'] = 0;
        $_SESSION['fullname'] = '';
        $_SESSION['LOGIN'] = false;
    }

    public function subscribe($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('subscribe.tpl');
    }

    public function mungeFormData(&$formvars) {
        $formvars['name'] = trim($formvars['name']);
        $formvars['lastname'] = trim($formvars['lastname']);
        $formvars['emailaddress'] = trim($formvars['emailaddress']);
    }

    public function activate($id) {
        $password = $this->generatePassword();
        $this->daoprofile->get($this->profile, $id);
        $this->profile->setPassword(md5($password));
        $this->profile->setActive(1);
        $this->daoprofile->save($this->profile);
        echo 'Uw wachtwoord is als volgt :' . $password;
    }

    public function save($formvars = array()) {
        $this->profile->setName($formvars['name']);
        $this->profile->setLastname($formvars['lastname']);
        $this->profile->setEmailaddress($formvars['emailaddress']);
        $this->profile->setActive(0);

        $id = $this->daoprofile->create($this->profile);
        $this->sendActivationMail($id, $formvars['emailaddress'], $formvars['name'] . ' ' . $formvars['lastname']);
    }

    public function checkLogin($formvars = array()) {
        $this->daoprofile->login($this->profile, $formvars['username'], md5($formvars['password']));
        if ($this->profile->getId() != 0) {
            $_SESSION['username'] = $this->profile->getEmailaddress();
            $_SESSION['id'] = $this->profile->getId();
            $_SESSION['fullname'] = $this->profile->getName() . ' ' . $this->profile->getLastname();
            $_SESSION['LOGIN'] = true;
            echo '<div class="blocks login">U bent ingelogd, u gaat naar startpagina.<meta http-equiv="refresh" content="0;URL=' . str_replace('index.php', '', $_SERVER['PHP_SELF']) . '" /></div>';
        } else {
            $_SESSION['username'] = '';
            $_SESSION['id'] = 0;
            $_SESSION['fullname'] = '';
            $_SESSION['LOGIN'] = false;
            echo '<div class="blocks login">U bent niet ingelogd, u gaat zo terug naar de startpagina en probeer het opnieuw.<meta http-equiv="refresh" content="1;URL=' . str_replace('index.php', '', $_SERVER['PHP_SELF']) . '" /></a></div>';
        }
    }

    public function miniProfile($id) {
        $this->daoprofile->get($this->profile, $id);
        $this->tpl->assignByRef('profile', $this->profile);
        $this->tpl->display('miniprofile.tpl');
    }

    private function generatePassword() {
        return uniqid('hob');
    }

    private function sendActivationMail($id, $emailaddress, $fullname) {
        $message = '<html>
            <body>
                <table width="300" cellspacing="0" cellpadding="0">
                    <tr><td>Beste ' . $fullname . ',</td></tr>
                    <tr><td style="height: 10px;">&nbsp;</td></tr>
                    <tr><td>U kunt uw account activeren door naar de volgende link te navigeren, namelijk: '. str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) . 'profile/activation/' . $id . '/</td></tr>
                    <tr><td style="height: 10px;">&nbsp;</td></tr>
                    <tr><td style="height: 10px;">Met vriendelijke groet,</td></tr>
                    <tr><td style="height: 30px;">&nbsp;</td></tr>
                    <tr><td>Hobbeezz.nl</td></tr>
                </table>
            </body>
        </html>';

        mail($emailaddress, 'Account activatie Hobbeezz.nl', $message);
        echo $message;
    }
}