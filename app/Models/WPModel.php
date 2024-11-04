<?php 
class WPModel {
    public static $name = 'wp_models';
    public static $singularName = 'wp_model';
    public static $autoRoutes = false;
    public static $fields = array(
        array(
            'name' => 'wp_model_id',
            'type' => 'mediumint(9) NOT NULL AUTO_INCREMENT',
            'primary' => 'TRUE'
        ),
        array(
            'name' => 'name',
            'type' => 'mediumint(9) DEFAULT 0 NOT NULL',
        ),
        array(
            'name' => 'singular_name',
            'type' => 'tinytext',
        ),
        array(
            'name' => 'model_settings',
            'type' => 'text',
        ),
        array(
            'name' => 'fields',
            'type' => 'text',
        ),
        array(
            'name' => 'created_datetime',
            'type' => "datetime DEFAULT '0000-00-00 00:00:00' NOT NULL"
        )
    );
}