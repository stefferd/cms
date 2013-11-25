<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 05-06-13
 * Time: 21:38
 */
require_once('./classes/settings.php');

require_once(classes . 'db.php');
require_once(classes . 'gallery/gallery.php');
require_once(classes . 'gallery/pictures.php');
require_once(classes . 'gallery/intdaogallery.php');

class DGallery implements IDGallery
{

    public function create(Gallery $gallery)
    {
        $time = time();
        $this->checkTableIsPresent();
        $gallery->setId($this->getMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO albums SET id = ?, name = ?, description = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('issisi',
                $gallery->getId(),
                $gallery->getName(),
                $gallery->getDescription(),
                $gallery->getActive(),
                $time,
                $gallery->getUser()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();

        return $gallery->getId();
    }

    public function update(Gallery $item)
    {
        $time = time();

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE albums SET name = ?, description = ?, active = ?, updated = ?, user = ? WHERE id = ?')) {
            $smtm->bind_param('ssisii',
                $item->getName(),
                $item->getDescription(),
                $item->getActive(),
                $time,
                $item->getUser(),
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
        if ($smtm = $db->mysqli->prepare('DELETE FROM albums WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function get($id)
    {
        $db = new Db();
        $gallery = new Gallery();

        if ($smtm = $db->mysqli->prepare('SELECT id, name, description, active, created, updated, user FROM albums WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $name, $description, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $gallery->setId($id);
                $gallery->setName($name);
                $gallery->setDescription($description);
                $gallery->setActive($active);
                $gallery->setCreated($created);
                $gallery->setUpdated($updated);
                $gallery->setUser($user);
            }
            $db->mysqli->close();
        }
        return $gallery;
    }

    public function getEntries($max = 15)
    {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, name, description, active, created, updated, user FROM albums LIMIT 0, ?')) {
            $smtm->bind_param('i', $max);
            $smtm->execute();
            $smtm->bind_result($id, $name, $description, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $gallery = new Gallery();
                $gallery->setId($id);
                $gallery->setName($name);
                $gallery->setDescription($description);
                $gallery->setActive($active);
                $gallery->setCreated($created);
                $gallery->setUpdated($updated);
                $gallery->setUser($user);
                array_push($entries, $gallery);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function createPicture(Picture $picture)
    {
        $time = time();
        $this->checkPictureTableIsPresent();
        $picture->setId($this->getPictureMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO album_pictures SET id = ?, url = ?, active = ?, created = ?, user = ?, album = ?')) {
            $smtm->bind_param('isisii',
                $picture->getId(),
                $picture->getUrl(),
                $picture->getActive(),
                $time,
                $picture->getUser(),
                $picture->getAlbum()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();

        return $picture->getId();
    }

    public function getPictures($album, $max = 100)
    {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, url, active, created, updated, user, album FROM album_pictures WHERE album = ? LIMIT 0, ?')) {
            $smtm->bind_param('ii', $album, $max);
            $smtm->execute();
            $smtm->bind_result($id, $url, $active, $created ,$updated, $user, $album);
            while ($smtm->fetch()) {
                $picture = new Picture();
                $picture->setId($id);
                $picture->setUrl($url);
                $picture->setActive($active);
                $picture->setCreated($created);
                $picture->setUpdated($updated);
                $picture->setUser($user);
                $picture->setAlbum($album);
                array_push($entries, $picture);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM albums')) {
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
        if ($db->mysqli->prepare('SELECT * FROM albums')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS albums
              (
                `id` int(11) NOT NULL,
                `name` varchar(250) NOT NULL,
                `description` TEXT NULL,
                `active` int(11) NOT NULL default \'1\',
                `created` varchar(40) NULL,
                `updated` varchar(40) NULL,
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

    private function getPictureMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM album_pictures')) {
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

    private function checkPictureTableIsPresent() {
        $db = new Db();
        if ($db->mysqli->prepare('SELECT * FROM album_pictures')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS album_pictures
              (
                `id` int(11) NOT NULL,
                `url` varchar(250) NOT NULL,
                `active` int(11) NOT NULL default \'1\',
                `created` varchar(40) NULL,
                `updated` varchar(40) NULL,
                `user` int(11) NOT NULL default \'0\',
                `album` int(11) NOT NULL default \'0\',
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
