<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'snippet/snippet.php');
require(classes . 'snippet/daosnippet.php');

class SnippetController {
    private $snippet = null;
    private $daosnippet = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new SnippetSmarty();
        $this->snippet = new Snippet();
        $this->daosnippet = new DaoSnippets();
    }

    public function getEntries() {
        return $this->daosnippet->getEntries();
    }

    public function getByUniqueid($uniqueid) {
        $this->daosnippet->getByUniqueid($this->snippet, $uniqueid);
        return $this->snippet->text;
    }
}