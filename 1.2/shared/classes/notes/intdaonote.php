<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. 'notes/note.php');

interface IntDaoNote
{
    /* Backend */
    public function save(Note $item);
    public function update(Note $item);
    public function delete($id);
    public function get(Note $item, $id);
    public function getEntries();
}
