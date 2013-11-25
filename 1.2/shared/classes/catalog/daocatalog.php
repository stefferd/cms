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
        if (defined('use_free_fields')) {
            $sql = 'INSERT INTO catalog SET id = ?, title = ?, text = ?, active = ?, created = ?, user = ?, youtube = ?, free_field_one = ?, free_field_two = ?, free_boolean_one = ?';
        } else {
            $sql = 'INSERT INTO catalog SET id = ?, title = ?, text = ?, active = ?, created = ?, user = ?, youtube = ?';
        }
        $db = new Db();
        if ($smtm = $db->mysqli->prepare($sql)) {
            if (defined('use_free_fields')) {
                $smtm->bind_param('issisisssi',
                    $item->getId(),
                    $item->getTitle(),
                    $item->getText(),
                    $item->getActive(),
                    $time,
                    $item->getUser(),
                    $item->getYoutube(),
                    $item->getFreeFieldOne(),
                    $item->getFreeFieldTwo(),
                    $item->getFreeBooleanOne()
                );
            } else {
                $smtm->bind_param('issisis',
                    $item->getId(),
                    $item->getTitle(),
                    $item->getText(),
                    $item->getActive(),
                    $time,
                    $item->getUser(),
                    $item->getYoutube()
                );
            }
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

        if (defined('use_free_fields')) {
            $sql = 'UPDATE catalog SET title = ?, text = ?, active = ?, updated = ?, user = ?, youtube = ?, free_field_one = ?, free_field_two = ?, free_boolean_one = ? WHERE id = ?';
        } else {
            $sql = 'UPDATE catalog SET title = ?, text = ?, active = ?, updated = ?, user = ?, youtube = ? WHERE id = ?';
        }
        $db = new Db();
        if ($smtm = $db->mysqli->prepare($sql)) {
            if (defined('use_free_fields')) {
                $smtm->bind_param('ssisisssii',
                    $item->getTitle(),
                    $item->getText(),
                    $item->getActive(),
                    $time,
                    $item->getUser(),
                    $item->getYoutube(),
                    $item->getFreeFieldOne(),
                    $item->getFreeFieldTwo(),
                    $item->getFreeBooleanOne(),
                    $item->getId()
                );
            } else {
                $smtm->bind_param('ssisisi',
                    $item->getTitle(),
                    $item->getText(),
                    $item->getActive(),
                    $time,
                    $item->getUser(),
                    $item->getYoutube(),
                    $item->getId()
                );
            }
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
            $this->deleteCar($id);
            return true;
        } else {
            return false;
        }
    }

    public function deleteCar($id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM catalog_car WHERE catalog = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            $this->deleteCar($id);
            return true;
        } else {
            return false;
        }
    }

    public function get($item, $id)
    {
        if (defined('use_free_fields')) {
            $sql = 'SELECT id, title, text, active, created, updated, user, youtube, free_field_one, free_field_two, free_boolean_one FROM catalog WHERE id = ?';
        } else {
            $sql = 'SELECT id, title, text, active, created, updated, user, youtube FROM catalog WHERE id = ?';
        }
        $db = new Db();
        if ($smtm = $db->mysqli->prepare($sql)) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            if (defined('use_free_fields')) {
                $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user, $youtube, $free_field_one, $free_field_two, $free_boolean_one);
                while ($smtm->fetch()) {
                    $item->setId($id);
                    $item->setTitle($title);
                    $item->setText($text);
                    $item->setActive($active);
                    $item->setCreated($created);
                    $item->setUpdated($updated);
                    $item->setUser($user);
                    $item->setYoutube($youtube);
                    $item->setFreeFieldOne($free_field_one);
                    $item->setFreeFieldTwo($free_field_two);
                    $item->setFreeBooleanOne($free_boolean_one);
                }
            } else {
                $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user, $youtube);
                while ($smtm->fetch()) {
                    $item->setId($id);
                    $item->setTitle($title);
                    $item->setText($text);
                    $item->setActive($active);
                    $item->setCreated($created);
                    $item->setUpdated($updated);
                    $item->setUser($user);
                    $item->setYoutube($youtube);
                }
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

        if (defined('use_free_fields')) {
            $sql = 'SELECT id, title, text, active, created, updated, user, youtube, free_field_one, free_field_two, free_boolean_one FROM catalog ORDER BY id DESC';
        } else {
            $sql = 'SELECT id, title, text, active, created, updated, user, youtube FROM catalog';
        }
        if ($smtm = $db->mysqli->prepare($sql)) {
            $smtm->execute();
            if (defined('use_free_fields')) {
                $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user, $youtube, $free_field_one, $free_field_two, $free_boolean_one);
                while ($smtm->fetch()) {
                    $car = $this->isCar($id);
                    if ($car) {
                        $item = new Car();
                    } else {
                        $item = new CatItem();
                    }
                    $item->setId($id);
                    $item->setTitle($title);
                    $item->setText($text);
                    $item->setActive($active);
                    $item->setCreated($created);
                    $item->setUpdated($updated);
                    $item->setUser($user);
                    $item->setYoutube($youtube);
                    $item->setFreeFieldOne($free_field_one);
                    $item->setFreeFieldTwo($free_field_two);
                    $item->setFreeBooleanOne($free_boolean_one);
                    if ($car) {
                        $this->getCar($item, $id);
                    }
                    array_push($entries, $item);
                }
            } else {
                $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user, $youtube);
                while ($smtm->fetch()) {
                    $car = $this->isCar($id);
                    if ($car) {
                        $item = new Car();
                    } else {
                        $item = new CatItem();
                    }
                    $item->setId($id);
                    $item->setTitle($title);
                    $item->setText($text);
                    $item->setActive($active);
                    $item->setCreated($created);
                    $item->setUpdated($updated);
                    $item->setUser($user);
                    $item->setYoutube($youtube);
                    if ($car) {
                        $this->getCar($item, $id);
                    }
                    array_push($entries, $item);
                }
            }

            $db->mysqli->close();
        }
        return $entries;
    }

    public function getTypes($brand) {
        $types = array();
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT DISTINCT(type) as type FROM catalog_car WHERE brand = ? ORDER BY type ASC')) {
            $smtm->bind_param('s', $brand);
            $smtm->execute();
            $smtm->bind_result($type);
            while ($smtm->fetch()) {
                array_push($types, $type);
            }
            $smtm->close();
        }
        $db->mysqli->close();
        return $types;
    }

    public function getCars($brand, $type, $price) {
        if (!empty($price)) {
            return $this->getCarsByMaxPrice($brand, $type, $price);
        }
        $entries = array();
        $db = new Db();
        $type = '%' . $type . '%';
        $brand = '%' . $brand . '%';
        if ($smtm = $db->mysqli->prepare('SELECT id, brand, type, year, state, milage, engine, transmition, price, transportCostPerKm, catalog, location, mainimage FROM catalog_car WHERE brand LIKE ? AND type LIKE ? ORDER BY id DESC')) {
            $smtm->bind_param('ss', $brand, $type);
            $smtm->execute();
            $smtm->bind_result($id, $brand, $type, $year, $state, $milage, $engine, $transmition, $price, $transportCostPerKm, $catalog, $location, $mainimage);
            while ($smtm->fetch()) {
                $item = new Car();
                $item->setIdentifier($id);
                $item->setBrand($brand);
                $item->setType($type);
                $item->setYear($year);
                $item->setState($state);
                $item->setMilage($milage);
                $item->setEngine($engine);
                $item->setTransmission($transmition);
                $item->setPrice($price);
                $item->setLocation($location);
                $item->setMainimage($mainimage);
                $this->get($item, $catalog);
                array_push($entries, $item);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function getCarsByMaxPrice($brand, $type, $price) {
        $entries = array();
        $db = new Db();
        $type = '%' . $type . '%';
        $brand = '%' . $brand . '%';
        if ($smtm = $db->mysqli->prepare('SELECT id, brand, type, year, state, milage, engine, transmition, price, transportCostPerKm, catalog, location, mainimage FROM catalog_car WHERE brand LIKE ? AND type LIKE ? AND price <= ? ORDER BY id DESC')) {
            $smtm->bind_param('ssi', $brand, $type, $price);
            $smtm->execute();
            $smtm->bind_result($id, $brand, $type, $year, $state, $milage, $engine, $transmition, $price, $transportCostPerKm, $catalog, $location, $mainimage);
            while ($smtm->fetch()) {
                $item = new Car();
                $item->setIdentifier($id);
                $item->setBrand($brand);
                $item->setType($type);
                $item->setYear($year);
                $item->setState($state);
                $item->setMilage($milage);
                $item->setEngine($engine);
                $item->setTransmission($transmition);
                $item->setPrice($price);
                $item->setLocation($location);
                $item->setMainimage($mainimage);
                $this->get($item, $catalog);
                array_push($entries, $item);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    /* Private functions */
    private function isCar($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id FROM catalog_car WHERE catalog = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id);
            $smtm->fetch();
            $smtm->close();
            if ($id && $id > 0) {
                $db->mysqli->close();
                return true;
            } else {
                $db->mysqli->close();
                return false;
            }
        } else {
            $db->mysqli->close();
            return false;
        }
    }

    private function getCar(Car $item, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, brand, type, year, state, milage, engine, transmition, price, transportCostPerKm, catalog, location, mainimage FROM catalog_car WHERE catalog = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $brand, $type, $year, $state, $milage, $engine, $transmition, $price, $transportCostPerKm, $catalog, $location, $mainimage);
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
                $item->setLocation($location);
                $item->setMainimage($mainimage);
                $db->mysqli->close();
            }
        }
    }

    private function updateCar(Car $item) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE catalog_car SET brand = ?, type = ?, year = ?, state = ?, milage = ?, engine = ?, transmition = ?, price = ?, transportCostPerKm = ?,
                    location = ?, mainimage = ?  WHERE catalog = ?'))
        {
            $smtm->bind_param('sssssssisssi',
                $item->getBrand(),
                $item->getType(),
                $item->getYear(),
                $item->getState(),
                $item->getMilage(),
                $item->getEngine(),
                $item->getTransmission(),
                $item->getPrice(),
                $item->getTransportCostPerKm(),
                $item->getLocation(),
                $item->getMainimage(),
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
        if ($smtm = $db->mysqli->prepare('INSERT INTO catalog_car SET id = ?, brand = ?, type = ?, year = ?, state = ?, milage = ?, engine = ?, transmition = ?, price = ?, transportCostPerKm = ?, location = ?, catalog = ?'))
        {
            $smtm->bind_param('isssssssissi',
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
                $item->getLocation(),
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
                `location` varchar(250) NULL,
                `mainimage` varchar(250) NULL,
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
                `youtube` varchar(250) NULL,
                `user` int(11) NOT NULL default \'0\',
                `delete` int(2) NOT NULL default \'0\',
                `free_field_one` varchar(250) NULL,
                `free_field_two` varchar(250) NULL,
                `free_boolean_one` INT( 10 ) NULL DEFAULT \'0\',
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
}
