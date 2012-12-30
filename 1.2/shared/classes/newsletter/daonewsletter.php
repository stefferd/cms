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
require_once(classes . 'newsletter/newsletter.php');
require_once(classes . 'newsletter/intdaonewsletter.php');

class DaoNewsletter implements IntDaoNewsletter
{
    public function delete($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM newsletter WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function save(Newsletter $newsletter)
    {
        $this->checkTableIsPresent();
        $newsletter->setId($this->getMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO newsletter SET id = ?, title = ?, text = ?, document = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('isssisi',
                $newsletter->getId(),
                $newsletter->getTitle(),
                $newsletter->getText(),
                $newsletter->getDocument(),
                $newsletter->getActive(),
                time(),
                $newsletter->getUser()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $newsletter->getId();
    }

    public function update(Newsletter $newsletter)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE newsletter SET title = ?, text = ?, document = ?, active = ?, updated = ?, user = ? WHERE id = ?')) {
            $smtm->bind_param('sssisii',
                $newsletter->getTitle(),
                $newsletter->getText(),
                $newsletter->getdocument(),
                $newsletter->getActive(),
                time(),
                $newsletter->getUser(),
                $newsletter->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function get(Newsletter $newsletter, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, document, active, created, updated, user FROM newsletter WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $document, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $newsletter->setId($id);
                $newsletter->setTitle($title);
                $newsletter->setText($text);
                $newsletter->setDocument($document);
                $newsletter->setActive($active);
                $newsletter->setCreated($created);
                $newsletter->setUpdated($updated);
                $newsletter->setUser($user);
            }
            $db->mysqli->close();
        }
    }

    public function getEntries() {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, document, active, created, updated, user FROM newsletter')) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $document, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $newsletter = new newsletter();
                $newsletter->setId($id);
                $newsletter->setTitle($title);
                $newsletter->setText($text);
                $newsletter->setDocument($document);;
                $newsletter->setActive($active);
                $newsletter->setCreated($created);
                $newsletter->setUpdated($updated);
                $newsletter->setUser($user);
                array_push($entries, $newsletter);
            }
            $db->mysqli->close();
        }
        return $entries;
    }
    
    /* Private functions */

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM newsletter')) {
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
        if ($db->mysqli->prepare('SELECT * FROM newsletter')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `newsletter`
              (
                `id` int(11) NOT NULL,
                `title` varchar(250) NOT NULL,
                `text` TEXT NULL,
                `document` varchar(250) NULL,
                `active` int(11) NOT NULL default \'1\',
                `created` varchar(40) NULL,
                `updated` varchar(40) NULL,
                `user` int(11) NOT NULL default \'0\',
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
}
