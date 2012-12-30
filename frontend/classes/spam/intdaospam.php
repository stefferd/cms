<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. 'spam/spam.php');

interface IntDaoSpam
{
    /* Backend */
    public function save(Spam $spam);
}
