<?php
class AuthApi {
    protected $loader;

    public function __construct() {
		$this->load_routes();
        $this->load_controllers();
		/*$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();*/
	}

    private function load_controllers() {
        require AUTHENTICATIONAPI_DIR . 'app\Http\Controllers\AuthController.php';
    }

    private function load_routes() {
        require AUTHENTICATIONAPI_DIR . 'routes\auth_api.php';
    }

    public function run() {
		//$this->loader->run();
	}
}
?>