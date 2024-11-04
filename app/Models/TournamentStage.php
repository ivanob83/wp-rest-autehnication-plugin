<?php 
class TournamentStage {
    public static $name = 'tournament_stages';
    public static $singularName = 'tournament_stage';
    public static $autoRoutes = true;
    public static $fields = array(
        array(
            'name' => 'tournament_stage_id',
            'type' => 'mediumint(9) NOT NULL AUTO_INCREMENT',
            'primary' => 'TRUE'
        ),
        array(
            'name' => 'tournament_id',
            'type' => 'mediumint(9) DEFAULT 0 NOT NULL',
        ),
        array(
            'name' => 'type',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'structure',
            'type' => 'text',
        ),
    );
}
?>