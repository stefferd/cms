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
require_once(classes . 'catalog/catitem.php');
require_once(classes . 'catalog/car.php');
require_once(classes . 'catalog/intdaocatalog.php');

class DaoCatalog implements IntDaoCatalog
{

    public function save($item)
    {
        $time = time();
        $this->checkTableIsPresent();
        $item->setId($this->getMaxId('catalog'));

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO catalog SET id = ?, title = ?, text = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('issisi',
                $item->getId(),
                $item->getTitle(),
                $item->getText(),
                $item->getActive(),
                $time,
                $item->getUser()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();

        if (get_class($item) == 'Car') {
            $this->saveCar($item);
        }
        return $item->getId();
    }

    public function update($item)
    {
        $time = time();

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE catalog SET title = ?, text = ?, active = ?, updated = ?, user = ? WHERE id = ?')) {
            $smtm->bind_param('ssisii',
                $item->getTitle(),
                $item->getText(),
                $item->getActive(),
                $time,
                $item->getUser(),
                $item->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();

        if (get_class($item) == 'Car') {
            $this->updateCar($item);
        }
        return true;
    }

    public function delete($id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM catalog WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function get($item, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, active, created, updated, user FROM catalog WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $item->setId($id);
                $item->setTitle($title);
                $item->setText($text);
                $item->setActive($active);
                $item->setCreated($created);
                $item->setUpdated($updated);
                $item->setUser($user);
            }
            $db->mysqli->close();
        }

        if (get_class($item) == 'Car') {
            $this->getCar($item, $id);
        }
    }

    public function getEntries()
    {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, active, created, updated, user FROM catalog')) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $item = new CatItem();
                $item->setId($id);
                $item->setTitle($title);
                $item->setText($text);
                $item->setActive($active);
                $item->setCreated($created);
                $item->setUpdated($updated);
                $item->setUser($user);
                array_push($entries, $item);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    /* Private functions */
    private function getCar(Car $item, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, brand, type, year, state, milage, engine, transmition, price, transportCostPerKm, catalog FROM catalog_car WHERE catalog = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $brand, $type, $year, $state, $milage, $engine, $transmition, $price, $transportCostPerKm, $catalog);
            while ($smtm->fetch()) {
                $item->setIdentifier($id);
                $item->setBrand($brand);
                $item->setType($type);
                $item->setYear($year);
                $item->setState($state);
                $item->setMilage($milage);
                $item->setEngine($engine);
                $item->setTransmission($transmition);
                $item->setPrice($price);
                $item->setTransportCostPerKm($transportCostPerKm);
            }
            $db->mysqli->close();
        }
    }

    private function updateCar(Car $item) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE catalog_car SET brand = ?, type = ?, year = ?, state = ?, milage = ?, engine = ?, transmition = ?, price = ?, transportCostPerKm = ? WHERE catalog = ?'))
        {
            $smtm->bind_param('sssssssisi',
                $item->getBrand(),
                $item->getType(),
                $item->getYear(),
                $item->getState(),
                $item->getMilage(),
                $item->getEngine(),
                $item->getTransmission(),
                $item->getPrice(),
                $item->getTransportCostPerKm(),
                $item->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    private function saveCar(Car $item) {
        $this->checkCarTableIsPresent();
        $item->setIdentifier($this->getMaxId('catalog_car'));

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO catalog_car SET id = ?, brand = ?, type = ?, year = ?, state = ?, milage = ?, engine = ?, transmition = ?, price = ?, transportCostPerKm = ?, catalog = ?'))
        {
            $smtm->bind_param('isssssssisi',
                $item->getIdentifier(),
                $item->getBrand(),
                $item->getType(),
                $item->getYear(),
                $item->getState(),
                $item->getMilage(),
                $item->getEngine(),
                $item->getTransmission(),
                $item->getPrice(),
                $item->getTransportCostPerKm(),
                $item->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    private function getMaxId($table) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM ' . $table)) {
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

    private function checkCarTableIsPresent() {
        $db = new Db();
        if ($db->mysqli->prepare('SELECT * FROM catalog_car')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `catalog_car`
              (
                `id` int(11) NOT NULL,
                `brand` varchar(250) NULL,
                `type` varchar(250) NULL,
                `year` varchar(50) NULL,
                `state` varchar(250) NULL,
                `milage` varchar(250) NULL,
                `engine` varchar(250) NULL,
                `transmition` varchar(250) NULL,
                `price` int(50) NULL,
                `transportCostPerKm` varchar(50) NULL,
                `catalog` int(11) NOT NULL default \'0\',
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    private function checkTableIsPresent() {
        $db = new Db();
        if ($db->mysqli->prepare('SELECT * FROM catalog')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `catalog`
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
