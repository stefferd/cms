<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. 'news/news.php');

interface IntDaoNews
{
    /* Backend */
    public function save(News $news);
    public function update(News $news);
    public function delete($id);
    public function get(News $news, $id);
    public function getEntries();
}
