<?php
class Point {
    public static $name = 'points';
    public static $singularName = 'point';
    public static $autoRoutes = true;
    public static $fields = array(
        array(
            'name' => 'point_id',
            'type' => 'mediumint(9) NOT NULL AUTO_INCREMENT',
            'primary' => 'TRUE'
        ),
        array(
            'name' => 'matchplay_id',
            'type' => 'mediumint(9) DEFAULT 0 NOT NULL',
        ),
        array(
            'name' => 'player_id',
            'type' => 'mediumint(9) DEFAULT 0 NOT NULL',
        ),
        array(
            'name' => 'tournament_id',
            'type' => 'mediumint(9) DEFAULT 0 NOT NULL',
        ),
        array(
            'name' => 'value',
            'type' => 'int(9)',
        ),
        array(
            'name' => 'created',
            'type' => "datetime DEFAULT '0000-00-00 00:00:00' NOT NULL",
        )
    );
}
?>