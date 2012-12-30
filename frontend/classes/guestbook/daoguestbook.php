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
require_once(classes . 'guestbook/guestbook.php');
require_once(classes . 'guestbook/intdaoguestbook.php');

class DaoGuestbook implements IntDaoGuestbook
{
    public function delete($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM guestbook WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function save(Guestbook $guestbook)
    {
        $this->checkTableIsPresent();
        $guestbook->setId($this->getMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO guestbook SET id = ?, title = ?, text = ?, active = ?, created = ?')) {
            $smtm->bind_param('issis',
                $guestbook->getId(),
                $guestbook->getTitle(),
                $guestbook->getText(),
                $guestbook->getActive(),
                time()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $guestbook->getId();
    }

    public function update(Guestbook $guestbook)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE guestbook SET title = ?, text = ?, active = ? WHERE id = ?')) {
            $smtm->bind_param('ssii',
                $guestbook->getTitle(),
                $guestbook->getText(),
                $guestbook->getActive(),
                $guestbook->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function get(Guestbook $guestbook, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, active, created FROM guestbook WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created);
            while ($smtm->fetch()) {
                $guestbook->setId($id);
                $guestbook->setTitle($title);
                $guestbook->setText($text);
                $guestbook->setActive($active);
                $guestbook->setCreated($created);
            }
            $db->mysqli->close();
        }
    }

    public function getEntries($max = 0) {
        $entries = array();
        $db = new Db();
        if ($max == 0) {
            $sql = 'SELECT id, title, text, active, created FROM guestbook ORDER BY id DESC';
        } else {
            $sql = 'SELECT id, title, text, active, created FROM guestbook ORDER BY id DESC LIMIT 0, ' . $max;
        }
        if ($smtm = $db->mysqli->prepare($sql)) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created);
            while ($smtm->fetch()) {
                $guestbook = new Guestbook();
                $guestbook->setId($id);
                $guestbook->setTitle($title);
                $guestbook->setText($text);
                $guestbook->setActive($active);
                $guestbook->setCreated($created);
                array_push($entries, $guestbook);
            }
            $db->mysqli->close();
        }
        return $entries;
    }
    
    /* Private functions */

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM guestbook')) {
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
        if ($db->mysqli->prepare('SELECT * FROM guestbook')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `guestbook`
              (
                `id` int(11) NOT NULL,
                `title` varchar(250) NOT NULL,
                `text` TEXT NULL,
                `active` int(11) NOT NULL default \'1\',
                `created` varchar(40) NULL,
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
}
