<?php
class Tournament {
    public static $name = 'tournaments';
    public static $singularName = 'tournament';
    public static $autoRoutes = true;
    public static $fields = array(
        array(
            'name' => 'tournament_id',
            'type' => 'mediumint(9) NOT NULL AUTO_INCREMENT',
            'primary' => 'TRUE'
        ),
        array(
            'name' => 'name',
            'type' => 'tinytext',
            'adminListing' => 'Title'
        ),
        array(
            'name' => 'subname',
            'type' => 'tinytext',
            'adminListing' => 'Subtitle'
        ),
        array(
            'name' => 'description',
            'type' => 'text',
        ),
        array(
            'name' => 'year',
            'type' => 'int(9)',
        ),
        array(
            'name' => 'cycle',
            'type' => 'tinytext',
            'adminListing' => 'Cycle'
        ),
        array(
            'name' => 'status',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'type',
            'type' => 'text',
        ),
        array(
            'name' => 'players',
            'type' => 'text',
        ),
        array(
            'name' => 'settings',
            'type' => 'text',
        ),
        array(
            'name' => 'thumbnail_url',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'start_date',
            'type' => "datetime DEFAULT '0000-00-00 00:00:00' NOT NULL",
            'adminListing' => 'Start Date'
        )
    );
}
?>