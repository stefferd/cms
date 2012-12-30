<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once(classes. 'teams/team.php');

interface IntDaoTeam
{
    /* Backend */
    public function save(Team $team);
    public function update(Team $team);
    public function delete($id);
    public function get(Team $team, $id);
    public function getEntries();
}
