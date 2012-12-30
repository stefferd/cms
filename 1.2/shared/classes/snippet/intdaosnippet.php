<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. '/snippet/snippet.php');

interface IntDaoSnippets
{
    /* Backend */
    public function save(Snippet $snippet);
    public function update(Snippet $snippet);
    public function delete($id);
    public function get(Snippet $snippet, $id);
    public function getEntries();
    /* Frontend */
    public function getByUniqueid(Snippet $snippet, $uniqueid);
}
