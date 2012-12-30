<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. 'newsletterplus/newsletterplus.php');

interface IntDaoNewsletterPlus
{
    /* Backend */
    public function save(NewsletterPlus $newsletter);
    public function update(NewsletterPlus $newsletter);
    public function delete($id);
    public function get(NewsletterPlus $newsletter, $id);
    public function getEntries();
}
