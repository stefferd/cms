<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(controllers . 'newsletterplus/libs/mime_mail.class.php');
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

    public function view() {
        $this->tpl->assign('data', $this->daonewsletter->getEntries());
        $this->tpl->display('overview.tpl');
    }

    public function show($id) {
        $this->daonewsletter->get($this->newsletter, $id);
        $this->tpl->assign('content', $this->newsletter->getHtml());
        $this->tpl->assign('title', $this->newsletter->getTitle());
        $this->tpl->assign('send', $this->newsletter->getCreated());
        $this->tpl->display('show-newsletter.tpl');
    }

    public function selectImage($carid) {
        $ccatalog = new CatalogController();
        $images = $ccatalog->getPictures($carid);
        $daocatalog = new DaoCatalog();
        $car = new Car();
        $daocatalog->get($car, $carid);
        $this->tpl->assignByRef('catalogitem', $car);
        $this->tpl->assign('pictures', $images);
        $this->tpl->display('select-images.tpl');
    }

    /* Send newsletter */
    public function prepareNewsletter($to, $carid, $images) {
        $daocatalog = new DaoCatalog();
        $car = new Car();
        $daocatalog->get($car, $carid);
        $pictures = explode(',', $images);

        $this->newsletter->setTitle($car->getTitle());
        $this->newsletter->setUser($_SESSION['id']);
        $this->newsletter->setActive(1);
        $newsletterid = $this->daonewsletter->save($this->newsletter);

        $this->daonewsletter->get($this->newsletter, $newsletterid);

        $this->tpl->assign('subject', $car->getTitle());
        $this->tpl->assign('id', $car->getId());
        $this->tpl->assign('title', $car->getTitle());
        $this->tpl->assignByRef('car', $car);
        $this->tpl->assign('pictures', $pictures);
        $this->tpl->assign('newsletterid', $newsletterid);
        $emailmessage = $this->tpl->fetch('newsletter.tpl');
        $textmessage = 'If you can\'t read this message, go to http://www.classics-world.com/newsletter-plus/view/' . $newsletterid . '/';

        $this->newsletter->setHtml($emailmessage);
        $this->newsletter->setText($textmessage);

        $this->daonewsletter->update($this->newsletter);

        $from_e = "info@classics-world.com";
        $from_n = "Classics-world";
        $env = "info@classics-world.com";

        $subscribers = $this->getAllSubscribers();
        foreach($subscribers as $subscriber) {
            $mime = new MIME_Mail;
            $mime->addTo($subscriber->getEmail(),$subscriber->getName());
            $mime->setFrom( $from_e, $from_n );
            $mime->setEnvelop( $env );
            $mime->setSubject($car->getTitle());
            $mime->setHTMLPart($emailmessage);
            $mime->setPlainPart($textmessage);
            $mime->sendMail();
            $mime = null;
        }
        echo 'De nieuwsbrief is verstuurd';
    }

    private function send($to, $from, $subject, $textMessage, $htmlMessage) {
        $message = '';
        $bound_text = 	'mimemail1';
        $bound = 	    '--' . $bound_text . '\r\n';
        $bound_last = 	'--' . $bound_text . '--\r\n';

        $headers = 	    'From: ' . $from . '\r\n';
        $headers .= 	'MIME-Version: 1.0\r\n'
                        . 'Content-Type: multipart/mixed; boundary="' . $bound_text . '"';

        $message .= 	$textMessage . '\r\n' . $bound;

        $message .= 	'Content-Type: text/html; charset="iso-8859-1"\r\nContent-Transfer-Encoding: 7bit\r\n\r\n' . $htmlMessage . '\r\n' . $bound . '\r\n' . $bound_last;
        mail($to, $subject, $message, $headers);
    }

    /* Subscribers */

    public function import($file) {
        $count = 0;
        if ($file['csv']['tmp_name'] && strlen($file['csv']['tmp_name']) > 0) {
            $csv = $file['csv']['tmp_name'];
            $rejected = '';
            $handle = fopen($csv,"r");
            //loop through the csv file and insert into database
            do {
                if ($data[1]) {
                    if (!$this->daonewsletter->checkSubscription($data[1])
                        && !strstr($data[1], 'noreply')
                        && !strstr($data[1], 'postmaster')
                        && !strstr($data[1], 'klantservices')
                        && !strstr($data[1], 'beveiliging@'))
                    {
                        $this->subscriber->setActive(1);
                        $this->subscriber->setEmail($data[1]);
                        if (!empty($data[1]) && strlen($data[0] > 0)) {
                            $this->subscriber->setName($data[0]);
                        }
                        $this->subscriber->setUser($_SESSION['id']);
                        $this->daonewsletter->saveSubscriber($this->subscriber);
                        echo $data[1] . ' is ge&iuml;mporteerd<br />';
                        $count++;
                    } else {
                        $rejected .= $data[1] . ' is geweigerd of al aanwezig <br />';
                    }
                }
            } while ($data = fgetcsv($handle,3510,";"));
        }
        return $count . ' contactpersonen ge&iuml;mporteerd <br />Deze zijn niet toegevoegd: ' . $rejected;
    }

    public function prepareImport() {
        $this->tpl->display('import.tpl');
    }

    public function subscribers($data, $page = 0) {
        if ($page == 1 && isset($_SESSION['last_page']) && $_SESSION['last_page'] != 2) {
            $page = $_SESSION['last_page'];
        }
        $previous = ($page != 1) ? $page - 1 : 0;
        $total = $this->daonewsletter->getTotalSubscribers();
        $this->tpl->assign('data', $data);
        $this->tpl->assign('total', $total);
        $this->tpl->assign('current', $page);
        $this->tpl->assign('previous', $previous);
        $this->tpl->assign('next', ($page + 1));
        $this->tpl->assign('pages', ceil($total / 15));
        $this->tpl->display('subscribers.tpl');
    }

    public function deleteSubscriber($id) {
        return $this->daonewsletter->deleteSubscriber($id);
    }

    public function saveSubscriber($post = array()) {
        $this->subscriber->setName($post['name']);
        $this->subscriber->setActive(1);
        $this->subscriber->setEmail($post['email']);
        $this->subscriber->setUser($_SESSION['id']);

        $this->daonewsletter->saveSubscriber($this->subscriber);
    }

    public function getAllSubscribers() {
        return $this->daonewsletter->getSubscribers();
    }

    public function getSubscribers($page = 0) {
        $max = 15;
        if ($page == 1 && isset($_SESSION['last_page']) && $_SESSION['last_page'] != 2) {
            $page = $_SESSION['last_page'];
        }
        if ($page == 0) {
            return $this->daonewsletter->getSubsciberByPage(0, $max);
        } else {
            $_SESSION['last_page'] = $page;
            $start = ($page - 1) *  $max;
            return $this->daonewsletter->getSubsciberByPage($start, $max);
        }
    }

    public function searchSubscribers($query) {
        return $this->daonewsletter->searchSubscribers($query);
    }
}