<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. 'catalog/catitem.php');
require_once(classes. 'catalog/car.php');

interface IntDaoCatalog
{
    /* Backend */
    public function save($item);
    public function update($item);
    public function delete($id);
    public function get($item, $id);
    public function getEntries();
}
