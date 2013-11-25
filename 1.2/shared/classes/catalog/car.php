<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 27-12-12
 * Time: 18:19
 */
class Car extends CatItem
{
    protected $brand;
    protected $type;
    protected $year;
    protected $state;
    protected $milage;
    protected $engine;
    protected $transmission;
    protected $price;
    protected $transportCostPerKm;
    protected $identifier;
    protected $location;
    protected $mainimage;

    public function Car($id = 0, $title = '', $text = '', $active = 0, $created = '', $updated = '', $user = 0,
                        $brand = '', $type = '', $year = '', $state = '', $milage = 0, $engine = '', $transmission = 'MT',
                        $price = 0, $transportConstPerKm = 0, $indentifier = 0, $location = "", $mainimage = "")
    {
        parent::CatItem($id, $title, $text, $active, $created, $updated, $user);

        $this->setBrand($brand);
        $this->setEngine($engine);
        $this->setMilage($milage);
        $this->setType($type);
        $this->setYear($year);
        $this->setState($state);
        $this->setTransmission($transmission);
        $this->setPrice($price);
        $this->setTransportCostPerKm($transportConstPerKm);
        $this->setIdentifier($indentifier);
        $this->setLocation($location);
        $this->setMainimage($mainimage);
    }

    public function setBrand($brand) { $this->brand = $brand; }
    public function &getBrand() { return $this->brand; }

    public function setType($type) { $this->type = $type; }
    public function &getType() { return $this->type; }

    public function setYear($year) { $this->year = $year; }
    public function &getYear() { return $this->year; }

    public function setState($state) { $this->state = $state; }
    public function &getState() { return $this->state; }

    public function setEngine($engine) { $this->engine = $engine; }
    public function &getEngine() { return $this->engine; }

    public function setMilage($milage) { $this->milage = $milage; }
    public function &getMilage() { return $this->milage; }

    public function setPrice($price) { $this->price = $price; }
    public function &getPrice() { return $this->price; }

    public function setTransmission($transmission) { $this->transmission = $transmission; }
    public function &getTransmission() { return $this->transmission; }

    public function setTransportCostPerKm($transportCostPerKm) { $this->transportCostPerKm = $transportCostPerKm; }
    public function &getTransportCostPerKm() { return $this->transportCostPerKm; }

    public function setIdentifier($identifier) { $this->identifier = $identifier; }
    public function &getIdentifier() { return $this->identifier; }

    public function setLocation($location) { $this->location = $location; }
    public function &getLocation() { return $this->location; }

    public function setMainimage($mainimage) { $this->mainimage = $mainimage; }
    public function &getMainimage() { return $this->mainimage; }

}
