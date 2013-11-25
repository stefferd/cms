<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'news/news.php');
require(classes . 'news/daonews.php');

class NewsController {
    public $news = null;
    public $daonews = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new NewsSmarty();
        $this->news = new News();
        $this->daonews = new DaoNews();
    }

    public function getEntries($max = 0) {
        return $this->daonews->getEntries($max);
    }
}