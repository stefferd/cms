<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:16
 * To change this template use File | Settings | File Templates.
 */
require_once(classes . 'db.php');
require_once(classes . 'snippet/snippet.php');
require_once(classes . 'snippet/intdaosnippet.php');

class DaoSnippets implements IntDaoSnippets
{
    public function delete($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM snippet WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function save(Snippet $snippet)
    {
        $this->checkTableIsPresent();
        $snippet->setId($this->getMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO snippet SET id = ?, uniqueid = ?, title = ?, text = ?, active = ?, created = ?, user = ?, version = ?')) {
            $smtm->bind_param('isssisii',
                $snippet->getId(),
                $snippet->getUniqueid(),
                $snippet->getTitle(),
                $snippet->getText(),
                $snippet->getActive(),
                time(),
                $snippet->getUser(),
                $snippet->getVersion()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $snippet->getId();
    }

    public function update(Snippet $snippet)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE snippet SET uniqueid = ?, title = ?, text = ?, active = ?, updated = ?, user = ?, version = ? WHERE id = ?')) {
            $smtm->bind_param('sssisiii',
                $snippet->getUniqueid(),
                $snippet->getTitle(),
                $snippet->getText(),
                $snippet->getActive(),
                time(),
                $snippet->getUser(),
                $snippet->getVersion(),
                $snippet->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function get(Snippet $snippet, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, uniqueid, title, text, active, created, updated, user, version FROM snippet WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $uniqueid, $title, $text, $active, $created ,$updated, $user, $version);
            while ($smtm->fetch()) {
                $snippet->setId($id);
                $snippet->setUniqueid($uniqueid);
                $snippet->setTitle($title);
                $snippet->setText($text);
                $snippet->setActive($active);
                $snippet->setCreated($created);
                $snippet->setUpdated($updated);
                $snippet->setUser($user);
                $snippet->setVersion($version);
            }
            $db->mysqli->close();
        }
    }

    public function getEntries() {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, uniqueid, title, text, active, created, updated, user, version FROM snippet')) {
            $smtm->execute();
            $smtm->bind_result($id, $uniqueid, $title, $text, $active, $created ,$updated, $user, $version);
            while ($smtm->fetch()) {
                $snippet = new Snippet();
                $snippet->setId($id);
                $snippet->setUniqueid($uniqueid);
                $snippet->setTitle($title);
                $snippet->setText($text);
                $snippet->setActive($active);
                $snippet->setCreated($created);
                $snippet->setUpdated($updated);
                $snippet->setUser($user);
                $snippet->setVersion($version);
                array_push($entries, $snippet);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    /* Frontend */
    public function getByUniqueid(Snippet $snippet, $uniqueid) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, uniqueid, title, text, active, created, updated, user, version FROM snippet WHERE uniqueid = ?')) {
            $smtm->bind_param('s', $uniqueid);
            $smtm->execute();
            $smtm->bind_result($id, $uniqueid, $title, $text, $active, $created ,$updated, $user, $version);
            while ($smtm->fetch()) {
                $snippet->setId($id);
                $snippet->setUniqueid($uniqueid);
                $snippet->setTitle($title);
                $snippet->setText($text);
                $snippet->setActive($active);
                $snippet->setCreated($created);
                $snippet->setUpdated($updated);
                $snippet->setUser($user);
                $snippet->setVersion($version);
            }
            $db->mysqli->close();
        }
    }
    
    /* Private functions */

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM snippet')) {
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
        if ($db->mysqli->prepare('SELECT * FROM snippet')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `snippet`
              (
                `id` int(11) NOT NULL,
                `uniqueid` varchar(250) NOT NULL,
                `title` varchar(250) NOT NULL,
                `text` TEXT NULL,
                `active` int(11) NOT NULL default \'1\',
                `created` varchar(40) NULL,
                `updated` varchar(40) NULL,
                `user` int(11) NOT NULL default \'0\',
                `version` int(11) NOT NULL default \'1\',
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
}
