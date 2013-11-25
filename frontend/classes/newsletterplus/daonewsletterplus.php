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
        $newsletter->id = $this->getMaxId('newsletterplus');

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO newsletterplus SET id = ?, title = ?, text = ?, html = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('isssisi',
                $newsletter->id,
                $newsletter->title,
                $newsletter->text,
                $newsletter->html,
                $newsletter->active,
                time(),
                $newsletter->user
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $newsletter->id;
    }

    public function update(NewsletterPlus $newsletter)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE newsletterplus SET title = ?, text = ?, html = ?, active = ?, updated = ?, user = ? WHERE id = ?')) {
            $smtm->bind_param('sssisii',
                $newsletter->title,
                $newsletter->text,
                $newsletter->html,
                $newsletter->active,
                time(),
                $newsletter->user,
                $newsletter->id
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
                $newsletter->id = $id;
                $newsletter->title = $title;
                $newsletter->text = $text;
                $newsletter->html = $html;
                $newsletter->active = $active;
                $newsletter->created = $created;
                $newsletter->updated = $updated;
                $newsletter->user = $user;
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
                $newsletter->id = $id;
                $newsletter->title = $title;
                $newsletter->text = $text;
                $newsletter->html = $html;
                $newsletter->active = $active;
                $newsletter->created = $created;
                $newsletter->updated = $updated;
                $newsletter->user = $user;
                array_push($entries, $newsletter);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    /* Subscriber */

    public function saveSubscriber(Subscriber $subscriber) {
        $this->checkSubscriberIsPresent();
        $subscriber->id = $this->getMaxId('subscriber');

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO subscriber SET id = ?, name = ?, email = ?, active = ?, created = ?, user = ?')) {
            $smtm->bind_param('issisi',
                $subscriber->id,
                $subscriber->name,
                $subscriber->email,
                $subscriber->active,
                time(),
                $subscriber->user
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $subscriber->id;
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
                $subscriber->id = $id;
                $subscriber->name = $name;
                $subscriber->email = $email;
                $subscriber->active = $active;
                $subscriber->created = $created;
                $subscriber->updated = $updated;
                $subscriber->user = $user;
                array_push($entries, $subscriber);
            }
            $db->mysqli->close();
        }
        return $entries;
    }

    public function unsubscribe($email) {
        if ($this->checkSubscription($email)) {
            $db = new Db();
            if ($smtm = $db->mysqli->prepare('DELETE FROM subscriber WHERE email = ?')) {
                $smtm->bind_param('s', $email);
                $smtm->execute();
                $db->mysqli->close();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
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
