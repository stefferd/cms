<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 09-04-12
 * Time: 11:53
 */
class Db
{
    public $mysqli = null;

    public function Db() {
        /* default constructor */
        $this->mysqli = new mysqli(host, username, password, database);
    }
}
