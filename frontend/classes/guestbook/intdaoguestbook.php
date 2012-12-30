<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. 'guestbook/guestbook.php');

interface IntDaoGuestbook
{
    /* Backend */
    public function save(Guestbook $guestbook);
    public function update(Guestbook $guestbook);
    public function delete($id);
    public function get(Guestbook $guestbook, $id);
    public function getEntries();
}
