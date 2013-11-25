<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'newsletterplus/newsletterplus.php');
require(classes . 'newsletterplus/subscriber.php');
require(classes . 'newsletterplus/daonewsletterplus.php');

class NewsletterPlusController {
    private $newsletter = null;
    private $subscriber = null;
    private $daonewsletter = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new NewsletterPlusSmarty();
        $this->newsletter = new NewsletterPlus();
        $this->subscriber = new Subscriber();
        $this->daonewsletter = new DaoNewsletterPlus();
    }

    public function saveSubscriber($post = array()) {
        $this->subscriber->name = $post['name'];
        $this->subscriber->active = 1;
        $this->subscriber->email = $post['email'];
        $this->subscriber->user = $_SESSION['id'];

        $this->daonewsletter->saveSubscriber($this->subscriber);
    }

    public function checkSubscriber($email) {
        return $this->daonewsletter->checkSubscription($email);
    }

    public function unsubscripe($email) {
        return $this->daonewsletter->unsubscribe($email);
    }

    public function get($id) {
        $this->daonewsletter->get($this->newsletter, $id);
        return $this->newsletter;
    }

    public function getEntries() {
        return $this->daonewsletter->getEntries();
    }

    public function getSubscribers() {
        return $this->daonewsletter->getSubscribers();
    }
}