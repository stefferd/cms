<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 27-12-12
 * Time: 18:19
 */
class Car extends CatItem
{
    public $brand;
    public $type;
    public $year;
    public $state;
    public $milage;
    public $engine;
    public $transmission;
    public $price;
    public $transportCostPerKm;
    public $identifier;
    public $location;
    public $mainimage;

    public function Car($id = 0, $title = '', $text = '', $active = 0, $created = '', $updated = '', $user = 0,
                        $brand = '', $type = '', $year = '', $state = '', $milage = 0, $engine = '', $transmission = 'MT',
                        $price = 0, $transportConstPerKm = 0, $indentifier = 0, $location = "", $mainimage = "")
    {
        parent::CatItem($id, $title, $text, $active, $created, $updated, $user);

        $this->brand = $brand;
        $this->engine = $engine;
        $this->milage = $milage;
        $this->type = $type;
        $this->year = $year;
        $this->state = $state;
        $this->transmission = $transmission;
        $this->price = $price;
        $this->transportCostPerKm = $transportConstPerKm;
        $this->identifier = $indentifier;
        $this->location = $location;
        $this->mainimage = $mainimage;
    }
}
