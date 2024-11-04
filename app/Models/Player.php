<?php
class Player {
    public static $name = 'players';
    public static $singularName = 'player';
    public static $autoRoutes = true;
    public static $fields = array(
        array(
            'name' => 'player_id',
            'type' => 'mediumint(9) NOT NULL AUTO_INCREMENT',
            'primary' => 'TRUE'
        ),
        array(
            'name' => 'user_id',
            'type' => 'mediumint(9) DEFAULT 0 NOT NULL',
        ),
        array(
            'name' => 'first_name',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'last_name',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'birthdate',
            'type' => 'datetime',
        ),
        array(
            'name' => 'thumbnail',
            'type' => 'text',
        ),
    );
}
?>