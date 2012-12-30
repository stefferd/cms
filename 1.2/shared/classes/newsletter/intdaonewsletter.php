<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. 'newsletter/newsletter.php');

interface IntDaoNewsletter
{
    /* Backend */
    public function save(Newsletter $newsletter);
    public function update(Newsletter $newsletter);
    public function delete($id);
    public function get(Newsletter $newsletter, $id);
    public function getEntries();
}
