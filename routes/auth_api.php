<?php
add_action( 'rest_api_init', 'register_api_hooks' );

function register_api_hooks() {
  register_rest_route(
    'v2', 'login',
    array(
      'methods'  => 'POST',
      'callback' => ['AuthController', 'login'],
    )
  );
  register_rest_route(
    'v2', 'register',
    array(
      'methods'  => 'POST',
      'callback' => ['AuthController', 'register'],
    )
  );
  register_rest_route(
    'v2', 'forgot-password',
    array(
      'methods'  => 'POST',
      'callback' => ['AuthController', 'forgot_password'],
    )
  );
}
?>