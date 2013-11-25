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
require_once(classes . 'notes/note.php');
require_once(classes . 'notes/intdaonote.php');

class DaoNote implements IntDaoNote
{

    public function save(Note $item)
    {
        $time = time();
        $this->checkTableIsPresent();
        $item->setId($this->getMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO notes SET id = ?, name = ?, email = ?, text = ?, active = ?, created = ?, user = ?, catalog = ?')) {
            $smtm->bind_param('isssisii',
                $item->getId(),
                $item->getName(),
                $item->getEmail(),
                $item->getText(),
                $item->getActive(),
                $time,
                $item->getUser(),
                $item->getCatalog()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();

        return $item->getId();
    }

    public function update(Note $item)
    {
        $time = time();

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE catalog SET name = ?, email = ?, text = ?, active = ?, updated = ?, user = ?, catalog = ? WHERE id = ?')) {
            $smtm->bind_param('sssisiii',
                $item->getName(),
                $item->getEmail(),
                $item->getText(),
                $item->getActive(),
                $time,
                $item->getUser(),
                $item->getCatalog(),
                $item->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return true;
    }

    public function delete($id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM notes WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function get(Note $item, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, name, email, text, active, created, updated, user, catalog FROM notes WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $name, $email, $text, $active, $created ,$updated, $user, $catalog);
            while ($smtm->fetch()) {
                $item->setId($id);
                $item->setName($name);
                $item->setEmail($email);
                $item->setText($text);
                $item->setActive($active);
                $item->setCreated($created);
                $item->setUpdated($updated);
                $item->setUser($user);
                $item->setCatalog($catalog);
            }
            $db->mysqli->close();
        }
    }

    public function getEntries()
    {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, name, email, text, active, created, updated, user, catalog FROM notes')) {
            $smtm->execute();
            $smtm->bind_result($id, $name, $email, $text, $active, $created ,$updated, $user, $catalog);
            while ($smtm->fetch()) {
                $item = new Note();
                $item->setId($id);
                $item->setName($name);
                $item->setEmail($email);
                $item->setText($text);
                $item->setActive($active);
                $item->setCreated($created);
                $item->setUpdated($updated);
                $item->setUser($user);
                $item->setCatalog($catalog);
                array_push($entries, $item);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM notes')) {
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
        if ($db->mysqli->prepare('SELECT * FROM notes')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `notes`
              (
                `id` int(11) NOT NULL,
                `name` varchar(250) NOT NULL,
                `email` varchar(250) NOT NULL,
                `text` TEXT NULL,
                `active` int(11) NOT NULL default \'1\',
                `created` varchar(40) NULL,
                `updated` varchar(40) NULL,
                `catalog` int(11) NULL,
                `user` int(11) NOT NULL default \'0\',
                `delete` int(2) NOT NULL default \'0\',
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
}
