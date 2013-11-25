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
        $item->id = $this->getMaxId('catalog');

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO catalog SET id = ?, title = ?, text = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('issisi',
                $item->id,
                $item->title,
                $item->text,
                $item->active,
                $time,
                $item->user
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();

        if (get_class($item) == 'Car') {
            $this->saveCar($item);
        }
        return $item->id;
    }

    public function update($item)
    {
        $time = time();

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE catalog SET title = ?, text = ?, active = ?, updated = ?, user = ? WHERE id = ?')) {
            $smtm->bind_param('ssisii',
                $item->title,
                $item->text,
                $item->active,
                $time,
                $item->user,
                $item->id
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
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, active, created, updated, user, youtube FROM catalog WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user, $youtube);
            while ($smtm->fetch()) {
                $item->id = $id;
                $item->title = $title;
                $item->text = $text;
                $item->active = $active;
                $item->create = $created;
                $item->updated = $updated;
                $item->user = $user;
                $item->youtube = $youtube;
            }
            $db->mysqli->close();
        }

        if (get_class($item) == 'Car') {
            $this->getCar($item, $id);
        }
    }

    public function getEntriesByPage($start, $total) {
        $entries = array();
        $db = new Db();
        $limit = ' LIMIT ' . $start . ', ' . $total;
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, active, created, updated, user, youtube FROM catalog ORDER BY title ASC ' . $limit)) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user, $youtube);
            while ($smtm->fetch()) {
                $car = $this->isCar($id);
                if ($car) {
                    $item = new Car();
                } else {
                    $item = new CatItem();
                }
                $item->id = $id;
                $item->title = $title;
                $item->text = $text;
                $item->active = $active;
                $item->created = $created;
                $item->updated = $updated;
                $item->user = $user;
                $item->youtube = $youtube;
                if ($car) {
                    $this->getCar($item, $id);
                }
                array_push($entries, $item);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function getLastEntries($max = 0) {
        $entries = array();
        $db = new Db();
        $limit = '';
        if ($max != 0) {
            $limit = ' LIMIT 0, ' . $max;
        }
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, active, created, updated, user, youtube FROM catalog ORDER BY id DESC ' . $limit)) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user, $youtube);
            while ($smtm->fetch()) {
                $car = $this->isCar($id);
                if ($car) {
                    $item = new Car();
                } else {
                    $item = new CatItem();
                }
                $item->id = $id;
                $item->title = $title;
                $item->text = $text;
                $item->active = $active;
                $item->created = $created;
                $item->updated = $updated;
                $item->user = $user;
                $item->youtube = $youtube;
                if ($car) {
                    $this->getCar($item, $id);
                }
                array_push($entries, $item);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function getEntries($max = 0)
    {
        $entries = array();
        $db = new Db();
        $limit = '';
        if ($max != 0) {
            $limit = ' LIMIT 0, ' . $max;
        }
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, active, created, updated, user, youtube FROM catalog ORDER BY title ASC ' . $limit)) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $active, $created ,$updated, $user, $youtube);
            while ($smtm->fetch()) {
                $car = $this->isCar($id);
                if ($car) {
                    $item = new Car();
                } else {
                    $item = new CatItem();
                }
                $item->id = $id;
                $item->title = $title;
                $item->text = $text;
                $item->active = $active;
                $item->created = $created;
                $item->updated = $updated;
                $item->user = $user;
                $item->youtube = $youtube;
                if ($car) {
                    $this->getCar($item, $id);
                }
                array_push($entries, $item);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function getMainimageByCar($id) {
        $mainimage = '';
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT mainimage FROM catalog_car WHERE catalog = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($mainimage);
            $smtm->fetch();
            $smtm->close();
        }
        $db->mysqli->close();
        return $mainimage;
    }

    public function getBrands() {
        $brands = array();
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT DISTINCT(brand) as brand FROM catalog_car ORDER BY brand ASC')) {
            $smtm->execute();
            $smtm->bind_result($brand);
            while ($smtm->fetch()) {
                array_push($brands, $brand);
            }
            $smtm->close();
        }
        $db->mysqli->close();
        return $brands;
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
        if ($smtm = $db->mysqli->prepare('SELECT id, brand, type, year, state, milage, engine, transmition, price, transportCostPerKm, catalog, location FROM catalog_car WHERE brand LIKE ? AND type LIKE ? ORDER BY id DESC')) {
            $smtm->bind_param('ss', $brand, $type);
            $smtm->execute();
            $smtm->bind_result($id, $brand, $type, $year, $state, $milage, $engine, $transmition, $price, $transportCostPerKm, $catalog, $location);
            while ($smtm->fetch()) {
                $item = new Car();
                $item->identifier = $id;
                $item->brand = $brand;
                $item->type = $type;
                $item->year = $year;
                $item->state = $state;
                $item->milage = $milage;
                $item->engine = $engine;
                $item->transmission = $transmition;
                $item->price = $price;
                $item->location = $location;
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
        if ($smtm = $db->mysqli->prepare('SELECT id, brand, type, year, state, milage, engine, transmition, price, transportCostPerKm, catalog, location FROM catalog_car WHERE brand LIKE ? AND type LIKE ? AND price <= ? ORDER BY id DESC')) {
            $smtm->bind_param('ssi', $brand, $type, $price);
            $smtm->execute();
            $smtm->bind_result($id, $brand, $type, $year, $state, $milage, $engine, $transmition, $price, $transportCostPerKm, $catalog, $location);
            while ($smtm->fetch()) {
                $item = new Car();
                $item->identifier = $id;
                $item->brand = $brand;
                $item->type = $type;
                $item->year = $year;
                $item->state = $state;
                $item->milage = $milage;
                $item->engine = $engine;
                $item->transmission = $transmition;
                $item->price = $price;
                $item->transportCostPerKm = $transportCostPerKm;
                $item->location = $location;
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
        if ($smtm = $db->mysqli->prepare('SELECT id, brand, type, year, state, milage, engine, transmition, price, transportCostPerKm, catalog, location FROM catalog_car WHERE catalog = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $brand, $type, $year, $state, $milage, $engine, $transmition, $price, $transportCostPerKm, $catalog, $location);
            while ($smtm->fetch()) {
                $item->identifier = $id;
                $item->brand = $brand;
                $item->type = $type;
                $item->year = $year;
                $item->state = $state;
                $item->milage = $milage;
                $item->engine = $engine;
                $item->transmission = $transmition;
                $item->price = $price;
                $item->location = $location;
                $item->transportCostPerKm = $transportCostPerKm;
                $db->mysqli->close();
            }
        }
    }

    private function updateCar(Car $item) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE catalog_car SET brand = ?, type = ?, year = ?, state = ?, milage = ?, engine = ?, transmition = ?, price = ?, transportCostPerKm = ?, location = ? WHERE catalog = ?'))
        {
            $smtm->bind_param('sssssssissi',
                $item->brand,
                $item->type,
                $item->year,
                $item->state,
                $item->milage,
                $item->engine,
                $item->transmission,
                $item->price,
                $item->transportCostPerKm,
                $item->location,
                $item->id
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

        private function saveCar(Car $item) {
        $this->checkCarTableIsPresent();
        $item->identifier = $this->getMaxId('catalog_car');

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO catalog_car SET id = ?, brand = ?, type = ?, year = ?, state = ?, milage = ?, engine = ?, transmition = ?, price = ?, transportCostPerKm = ?, location = ?, catalog = ?'))
        {
            $smtm->bind_param('isssssssissi',
                $item->identifier,
                $item->brand,
                $item->type,
                $item->year,
                $item->state,
                $item->milage,
                $item->engine,
                $item->transmission,
                $item->price,
                $item->transportCostPerKm,
                $item->location,
                $item->id
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function getTotalCars() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT count(id) as total FROM catalog_car')) {
            $smtm->execute();
            $smtm->bind_result($total);
            $smtm->fetch();
            $smtm->close();
        } else { $total = 1; }
        $db->mysqli->close();

        return $total;
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
                `delete` int(2) NOT NULL default \'0\'
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
    }
