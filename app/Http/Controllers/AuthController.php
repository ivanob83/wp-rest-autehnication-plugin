<?php 
class AuthController {
    public static function login($request) {
        $response = new stdClass;
        /*$creds = array();
        $creds['user_login'] = $request["user_login"];
        $creds['user_password'] =  $request["user_password"];
        $user = wp_signon( $creds, false );*/
        $jwt = new Jwt_Auth_Public('jwt','1');
        $req = new WP_REST_Request();
        $req['username'] = $request["user_login"];
        $req['password'] = $request["user_password"];
        $jwtresp = $jwt->generate_token($req);
        if(isset($jwtresp->errors)) {
            $response->errors = $jwtresp->errors;
            $response_code = 403;
        } else {
            //$response->user = $user;
            $response = $jwtresp;
            $response_code = 200;
        }
		return wp_send_json( $response, $response_code, 0 );
	}

    public static function register($request) {
        $response = new stdClass;
        $creds = array();
        $creds['user_login'] = $request["user_email"];
        $creds['user_email'] = $request["user_email"];
        $creds['first_name'] = $request["first_name"];
        $creds['last_name'] = $request["last_name"];
        $creds['user_pass'] =  $request["user_pass"];
        $user = wp_insert_user( $creds, false );
        if(is_object($user) && $user->errors) {
            $response->errors = $user->errors;
            $response_code = 403;
        } else {
            $response->user = $user;
            $response_code = 200;
        }
		return wp_send_json( $response, $response_code, 0 );
	}

    public static function forgot_password($request) {
        global $wpdb;
        $response = new stdClass;
        $email = $request['user_email'];
        $user_data = get_user_by('email', $email);
        if (empty($user_data)) {
            $user_data = get_user_by('login', $email);
        }
        if (empty($user_data)) {
            $response->errors = new stdClass;
            $response->errors->not_found = __('User not found');
            return wp_send_json( $response, 403, 0 );
        }

        $user_login = $user_data->user_login;
        $user_email = $user_data->user_email;

        $allow = apply_filters('allow_password_reset', true, $user_data->ID);
        if ( !$allow ) {
            $response->errors = new stdClass;
            $response->errors->not_allowed = __('Password Resset Not Allowed');
            return wp_send_json( $response, 403, 0 );
        } else if ( is_wp_error($allow)) {
            $response->errors = new stdClass;
            $response->errors->not_allowed = __('Password Resset Not Allowed');
            return wp_send_json( $response, 403, 0 );
        }

        $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
        if ( empty($key) ) {
            // Generate something random for a key...
            $key = wp_generate_password(20, false);
            do_action('retrieve_password_key', $user_login, $key);
            // Now insert the new md5 key into the db
            $wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
        }

        $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
        $message .= network_home_url( '/' ) . "\r\n\r\n";
        $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
        $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
        $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
        $message .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

        if ( is_multisite() ) {
            $blogname = $GLOBALS['current_site']->site_name;
        } else {
            // The blogname option is escaped with esc_html on the way into the database in sanitize_option
            // we want to reverse this for the plain text arena of emails.
            $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
        }

        $title = sprintf( __('[%s] Password Reset'), $blogname );

        $title = apply_filters('retrieve_password_title', $title);
        $message = apply_filters('retrieve_password_message', $message, $key);  

        if ( $message && !wp_mail($user_email, $title, $message)) {
            $response->errors = new stdClass;
            $response->errors->not_allowed = __('The e-mail could not be sent.');
            return wp_send_json( $response, 403, 0 );
        }


        $response->success =  __('Password reset link has been sent to your registered email.');
        return wp_send_json( $response, 200, 0 );
    }

    public static function current_user() {
        $response = new stdClass;
        $user = wp_get_current_user();
        if($user->errors) {
            $response->errors = $user->errors;
            $response_code = 403;
        } else {
            $response->user = $user;
            $response_code = 200;
        }
		return wp_send_json( $response, $response_code, 0 );
	}
}