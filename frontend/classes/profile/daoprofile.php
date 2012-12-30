<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:16
 * To change this template use File | Settings | File Templates.
 */
require_once('./classes/settings.php');

require_once(classes . 'db.php');
require_once(classes . 'profile/profile.php');
require_once(classes . 'profile/intdaoprofile.php');

class DaoProfile implements IntDaoProfile
{

    public function create(Profile $profile)
    {
        $this->checkTableIsPresent();
        $profile->setId($this->getMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO profile SET name = ?, lastname = ?, emailaddress = ?, password = ?, birthday = ?, created = ?, id = ?')) {
            $smtm->bind_param('ssssssi',
                $profile->getName(),
                $profile->getLastname(),
                $profile->getEmailaddress(),
                $profile->getPassword(),
                $profile->getBirthday(),
                time(),
                $profile->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $profile->getId();
    }

    public function save(Profile $profile)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE profile SET name = ?, lastname = ?, emailaddress = ?, birthday = ?, updated = ?, loggedin = ?, active = ? WHERE id = ?')) {
            $smtm->bind_param('ssssssii',
                $profile->getName(),
                $profile->getLastname(),
                $profile->getEmailaddress(),
                $profile->getBirthday(),
                time(),
                $profile->getLoggedIn(),
                $profile->getActive(),
                $profile->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function get(Profile $profile, $id)
    {
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, name, lastname, emailaddress, password, birthday, created, updated, loggedin FROM profile WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $name, $lastname, $emailaddress, $password, $birthday, $created, $updated, $loggedin);
            while ($smtm->fetch()) {
                $profile->setId($id);
                $profile->setName($name);
                $profile->setLastname($lastname);
                $profile->setEmailaddress($emailaddress);
                $profile->setPassword($password);
                $profile->setBirthday($birthday);
                $profile->setCreated($created);
                $profile->setUpdated($updated);
                $profile->setLoggedIn($loggedin);
            }
            $db->mysqli->close();
        }
    }

    public function delete($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM profile WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function getEntries() {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, name, lastname, emailaddress, password, birthday, created, updated, loggedin FROM profile')) {
            $smtm->execute();
            $smtm->bind_result($id, $name, $lastname, $emailaddress, $password, $birthday, $created, $updated, $loggedin);
            while ($smtm->fetch()) {
                $profile = new Profile();
                $profile->setId($id);
                $profile->setName($name);
                $profile->setLastname($lastname);
                $profile->setEmailaddress($emailaddress);
                $profile->setPassword($password);
                $profile->setBirthday($birthday);
                $profile->setCreated($created);
                $profile->setUpdated($updated);
                $profile->setLoggedIn($loggedin);
                array_push($entries, $profile);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function login(Profile $profile, $emailaddress, $password)
    {
        $this->checkTableIsPresent();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, name, lastname, emailaddress, password, birthday, created, updated, loggedin FROM profile WHERE emailaddress = ? AND password = ?')) {
            $smtm->bind_param('ss', $emailaddress,$password);
            $smtm->execute();
            $smtm->bind_result($id, $name, $lastname, $emailaddress, $password, $birthday, $created, $updated, $loggedin);
            while ($smtm->fetch()) {
                $profile->setId($id);
                $profile->setName($name);
                $profile->setLastname($lastname);
                $profile->setEmailaddress($emailaddress);
                $profile->setPassword($password);
                $profile->setBirthday($birthday);
                $profile->setCreated($created);
                $profile->setUpdated($updated);
                $profile->setLoggedIn($loggedin);
            }
            $db->mysqli->close();
        }
    }

    /* Private functions */

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM profile')) {
            $smtm->execute();
            $smtm->bind_result($id);
            $smtm->fetch();
            $smtm->close();
            if ($id && $id > 0) {
                $id += 1;
            } else {
                $id = 1;
            }
        } else { $id = 1; }
        $db->mysqli->close();

        return $id;
    }

    private function checkTableIsPresent() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT * FROM profile')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `profile`
              (
                `id` int(11) NOT NULL,
                `name` varchar(250) NOT NULL,
                `lastname` varchar(250) NOT NULL,
                `emailaddress` varchar(250) NOT NULL,
                `password` varchar(250) NULL,
                `birthday` varchar(40) NULL,
                `created` varchar(40) NULL,
                `updated` varchar(40) NULL,
                `loggedin` varchar(40) NULL,
                `active` int(11) NOT NULL default \'0\',
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
}
