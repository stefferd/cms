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
require_once(classes . 'spam/spam.php');
require_once(classes . 'spam/intdaospam.php');

class DaoSpam implements IntDaoSpam
{
    public function save(Spam $spam)
    {
        $this->checkTableIsPresent();
        $spam->setId($this->getMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO spam SET id = ?, ipaddress = ?, text = ?, created = ?')) {
            $smtm->bind_param('isss',
                $spam->getId(),
                $spam->getIpaddress(),
                $spam->getText(),
                time()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $spam->getId();
    }

    /* Private functions */

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM spam')) {
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
        if ($db->mysqli->prepare('SELECT * FROM spam')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `spam`
              (
                `id` int(11) NOT NULL,
                `ipaddress` varchar(250) NOT NULL,
                `text` TEXT NULL,
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
