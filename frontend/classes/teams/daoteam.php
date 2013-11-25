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
require_once(classes . 'teams/team.php');
require_once(classes . 'teams/intdaoteam.php');

class DaoTeam implements IntDaoTeam
{
    public function delete($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM team WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function save(Team $team)
    {
        $this->checkTableIsPresent();
        $team->id  = $this->getMaxId();

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO team SET id = ?, title = ?, text = ?, picture = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('isssisi',
                $team->id,
                $team->title,
                $team->text,
                $team->picture,
                $team->active,
                time(),
                $team->user
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $team->id;
    }

    public function update(Team $team)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE team SET title = ?, text = ?, picture = ?, active = ?, updated = ?, user = ? WHERE id = ?')) {
            $smtm->bind_param('sssisii',
                $team->title,
                $team->text,
                $team->picture,
                $team->active,
                time(),
                $team->user,
                $team->id
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function get(Team $team, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, picture, active, created, updated, user FROM team WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $picture, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $team->id = $id;
                $team->title = $title;
                $team->text = $text;
                $team->picture = $picture;
                $team->active = $active;
                $team->created = $created;
                $team->updated = $updated;
                $team->user = $user;
            }
            $db->mysqli->close();
        }
    }

    public function getEntries() {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, picture, active, created, updated, user FROM team ORDER BY id ASC')) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $picture, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $team = new Team();
                $team->id = $id;
                $team->title = $title;
                $team->text = $text;
                $team->picture = $picture;
                $team->active = $active;
                $team->created = $created;
                $team->updated = $updated;
                $team->user = $user;
                array_push($entries, $team);
            }
            $db->mysqli->close();
        }
        return $entries;
    }
    
    /* Private functions */

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM team')) {
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
        if ($db->mysqli->prepare('SELECT * FROM team')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `team`
              (
                `id` int(11) NOT NULL,
                `title` varchar(250) NOT NULL,
                `text` TEXT NULL,
                `picture` varchar(250) NULL,
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
