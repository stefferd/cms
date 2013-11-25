<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'teams/team.php');
require(classes . 'teams/daoteam.php');

class TeamController {
    private $teams = null;
    private $daoteams = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new TeamsSmarty();
        $this->teams = new Team();
        $this->daoteams = new DaoTeam();
    }

    public function getEntries() {
        return $this->daoteams->getEntries();
    }
}