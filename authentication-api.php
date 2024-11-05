<?php
/**
* Plugin Name: Autehnication Api
**/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define('AUTHENTICATIONAPI_DIR', plugin_dir_path( __FILE__ ));
define('AUTHENTICATIONAPI_FILENAME', __FILE__ );

require AUTHENTICATIONAPI_DIR . 'bootstrap/AuthApi.php';
require AUTHENTICATIONAPI_DIR . 'helpers/Database.php';

//Database::create('Tournament');

function run_api() {
	new AuthApi();
	//$plugin->run();

}
run_api();
?>