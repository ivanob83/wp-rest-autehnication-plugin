<?php
/**
* Plugin Name: Autehnication Api
**/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define('AUTEHNICATIONAPI_DIR', plugin_dir_path( __FILE__ ));
define('AUTEHNICATIONAPI_FILENAME', __FILE__ );

require AUTEHNICATIONAPI_DIR . 'bootstrap/AuthApi.php';
require AUTEHNICATIONAPI_DIR . 'app/Http/Controllers/Controller.php';
require AUTEHNICATIONAPI_DIR . 'helpers/Database.php';

//Database::create('Tournament');

function run_api() {
	new AuthApi();
	//$plugin->run();

}
run_api();
?>