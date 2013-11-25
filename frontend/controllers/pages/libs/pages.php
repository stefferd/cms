<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'pages/pages.php');
require(classes . 'pages/daopages.php');

class PagesController {
    public $pages = null;
    public $daopages = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new PagesSmarty();
        $this->pages = new Pages();
        $this->daopages = new DaoPages();
    }

    public function getEntries() {
        return $this->daopages->getEntries();
    }

    public function getEntry($uniqueid) {
        $this->daopages->getByUniqueId($this->pages, $uniqueid);
        return $this->pages->text;
    }
}