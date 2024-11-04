<?php
class MatchPlay {
    public static $name = 'matchplays';
    public static $singularName = 'matchplay';
    public static $autoRoutes = true;
    public static $fields = array(
        array(
            'name' => 'matchplay_id',
            'type' => 'mediumint(9) NOT NULL AUTO_INCREMENT',
            'primary' => 'TRUE'
        ),
        array(
            'name' => 'tournament_id',
            'type' => 'mediumint(9) DEFAULT 0 NOT NULL'
        ),
        array(
            'name' => 'status',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'p1',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'p2',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'winner',
            'type' => 'int(9)',
        ),
        array(
            'name' => 'result',
            'type' => 'text',
        ),
        array(
            'name' => 'type',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'start_date',
            'type' => "datetime DEFAULT '0000-00-00 00:00:00' NOT NULL",
        )
    );
}
?>