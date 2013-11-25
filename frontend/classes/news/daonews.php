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
require_once(classes . 'news/news.php');
require_once(classes . 'news/intdaonews.php');

class DaoNews implements IntDaoNews
{
    public function delete($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM news WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function save(News $news)
    {
        $this->checkTableIsPresent();
        $news->id = $this->getMaxId();

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO news SET id = ?, title = ?, text = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('issisi',
                $news->id,
                $news->title,
                $news->text,
                $news->active,
                time(),
                $news->user
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $news->id;
    }

    public function update(News $news)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE news SET title = ?, text = ?, active = ?, updated = ?, user = ? WHERE id = ?')) {
            $smtm->bind_param('ssisii',
                $news->title,
                $news->text,
                $news->active,
                time(),
                $news->user,
                $news->id
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function get(News $news, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, active, created, updated, user FROM news WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $news->id = $id;
                $news->title = $title;
                $news->text = $text;
                $news->active = $active;
                $news->created = $created;
                $news->updated = $updated;
                $news->user = $user;
            }
            $db->mysqli->close();
        }
    }

    public function getEntries($max = 0) {
        $entries = array();
        $db = new Db();
        if ($max == 0) {
            $sql = 'SELECT id, title, text, active, created, updated, user FROM news ORDER BY id DESC';
        } else {
            $sql = 'SELECT id, title, text, active, created, updated, user FROM news ORDER BY id DESC LIMIT 0, ' . $max;
        }
        if ($smtm = $db->mysqli->prepare($sql)) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $news = new News();
                $news->id = $id;
                $news->title = $title;
                $news->text = $text;
                $news->active = $active;
                $news->created = $created;
                $news->updated = $updated;
                $news->user = $user;
                array_push($entries, $news);
            }
            $db->mysqli->close();
        }
        return $entries;
    }
    
    /* Private functions */

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM news')) {
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
        if ($db->mysqli->prepare('SELECT * FROM news')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `news`
              (
                `id` int(11) NOT NULL,
                `title` varchar(250) NOT NULL,
                `text` TEXT NULL,
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
