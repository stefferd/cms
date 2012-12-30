<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. '/pages/pages.php');

interface IntDaoPages
{
    /* Backend */
    public function save(Pages $pages);
    public function update(Pages $pages);
    public function delete($id);
    public function get(Pages $pages, $id);
    public function getEntries();
    public function getPossibleParents();
    /* Frontend */
    public function getByUniqueId(Pages $pages, $uniqueid);
}
