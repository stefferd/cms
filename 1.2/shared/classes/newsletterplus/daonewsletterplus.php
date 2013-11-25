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
require_once(classes . 'newsletterplus/newsletterplus.php');
require_once(classes . 'newsletterplus/subscriber.php');
require_once(classes . 'newsletterplus/intdaonewsletterplus.php');

class DaoNewsletterPlus implements IntDaoNewsletterPlus
{
    public function delete($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM newsletterplus WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function save(NewsletterPlus $newsletter)
    {
        $this->checkTableIsPresent();
        $newsletter->setId($this->getMaxId('newsletterplus'));

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO newsletterplus SET id = ?, title = ?, text = ?, html = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('isssisi',
                $newsletter->getId(),
                $newsletter->getTitle(),
                $newsletter->getText(),
                $newsletter->getHtml(),
                $newsletter->getActive(),
                time(),
                $newsletter->getUser()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $newsletter->getId();
    }

    public function update(NewsletterPlus $newsletter)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE newsletterplus SET title = ?, text = ?, html = ?, active = ?, updated = ?, user = ? WHERE id = ?')) {
            $smtm->bind_param('sssisii',
                $newsletter->getTitle(),
                $newsletter->getText(),
                $newsletter->getHtml(),
                $newsletter->getActive(),
                time(),
                $newsletter->getUser(),
                $newsletter->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function get(NewsletterPlus $newsletter, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, html, active, created, updated, user FROM newsletterplus WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $html, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $newsletter->setId($id);
                $newsletter->setTitle($title);
                $newsletter->setText($text);
                $newsletter->setHtml($html);
                $newsletter->setActive($active);
                $newsletter->setCreated($created);
                $newsletter->setUpdated($updated);
                $newsletter->setUser($user);
            }
            $db->mysqli->close();
        }
    }

    public function getEntries() {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, title, text, html, active, created, updated, user FROM newsletterplus')) {
            $smtm->execute();
            $smtm->bind_result($id, $title, $text, $html, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $newsletter = new newsletterplus();
                $newsletter->setId($id);
                $newsletter->setTitle($title);
                $newsletter->setText($text);
                $newsletter->setHtml($html);;
                $newsletter->setActive($active);
                $newsletter->setCreated($created);
                $newsletter->setUpdated($updated);
                $newsletter->setUser($user);
                array_push($entries, $newsletter);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    /* Subscriber */

    public function saveSubscriber(Subscriber $subscriber) {
        $this->checkSubscriberIsPresent();
        $subscriber->setId($this->getMaxId('subscriber'));

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO subscriber SET id = ?, name = ?, email = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('issisi',
                $subscriber->getId(),
                $subscriber->getName(),
                $subscriber->getEmail(),
                $subscriber->getActive(),
                time(),
                $subscriber->getUser()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $subscriber->getId();
    }

    public function getSubscribers() {
        $this->checkSubscriberIsPresent();

        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, name, email, active, created, updated, user FROM subscriber')) {
            $smtm->execute();
            $smtm->bind_result($id, $name, $email, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $subscriber = new Subscriber();
                $subscriber->setId($id);
                $subscriber->setName($name);
                $subscriber->setEmail($email);
                $subscriber->setActive($active);
                $subscriber->setCreated($created);
                $subscriber->setUpdated($updated);
                $subscriber->setUser($user);
                array_push($entries, $subscriber);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function searchSubscribers($query) {
        $this->checkSubscriberIsPresent();

        $entries = array();
        $db = new Db();

        $query = '%' . $query . '%';

        if ($smtm = $db->mysqli->prepare('SELECT id, name, email, active, created, updated, user FROM subscriber WHERE email LIKE ?')) {
            $smtm->bind_param('s', $query);
            $smtm->execute();
            $smtm->bind_result($id, $name, $email, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $subscriber = new Subscriber();
                $subscriber->setId($id);
                $subscriber->setName($name);
                $subscriber->setEmail($email);
                $subscriber->setActive($active);
                $subscriber->setCreated($created);
                $subscriber->setUpdated($updated);
                $subscriber->setUser($user);
                array_push($entries, $subscriber);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function getTotalSubscribers() {
        $total = 0;
        $entries = array();
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT count(*) as total FROM subscriber')) {
            $smtm->execute();
            $smtm->bind_result($total);
            $smtm->fetch();
        }
        return $total;
    }

    public function getSubsciberByPage($start, $total) {
        $entries = array();
        $db = new Db();
        $limit = ' LIMIT ' . $start . ', ' . $total;
        if ($smtm = $db->mysqli->prepare('SELECT id, name, email, active, created, updated, user FROM subscriber ORDER BY id DESC' . $limit)) {
            $smtm->execute();
            $smtm->bind_result($id, $name, $email, $active, $created ,$updated, $user);
            while ($smtm->fetch()) {
                $subscriber = new Subscriber();
                $subscriber->setId($id);
                $subscriber->setName($name);
                $subscriber->setEmail($email);
                $subscriber->setActive($active);
                $subscriber->setCreated($created);
                $subscriber->setUpdated($updated);
                $subscriber->setUser($user);
                array_push($entries, $subscriber);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function deleteSubscriber($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM subscriber WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function checkSubscription($email) {
        $present = false;
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id FROM subscriber WHERE email = ?')) {
            $smtm->bind_param('s', $email);
            $smtm->execute();
            $smtm->bind_result($id);
            $smtm->fetch();
            $smtm->close();
            if ($id && $id > 0) {
                $present = true;
            }
        }
        $db->mysqli->close();

        return $present;
    }
    
    /* Private functions */

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

    private function checkTableIsPresent() {
        $db = new Db();
        if ($db->mysqli->prepare('SELECT * FROM newsletterplus')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `newsletterplus`
              (
                `id` int(11) NOT NULL,
                `title` varchar(250) NOT NULL,
                `text` TEXT NULL,
                `html` TEXT NULL,
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

    private function checkSubscriberIsPresent() {
        $db = new Db();
        if ($db->mysqli->prepare('SELECT * FROM subscriber')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `subscriber`
              (
                `id` int(11) NOT NULL,
                `name` varchar(250) NOT NULL,
                `email` varchar(250) NOT NULL,
                `active` int(11) NOT NULL default \'1\',
                `created` varchar(40) NULL,
                `updated` varchar(40) NULL,
                `user` int(11) NULL default \'0\',
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
}
