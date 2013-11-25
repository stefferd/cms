<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'newsletter/newsletter.php');
require(classes . 'newsletter/daonewsletter.php');

class NewsletterController {
    private $newsletter = null;
    private $daonewsletter = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new NewsletterSmarty();
        $this->newsletter = new Newsletter();
        $this->daonewsletter = new DaoNewsletter();
    }

    public function getEntries() {
        return $this->daonewsletter->getEntries();
    }
}