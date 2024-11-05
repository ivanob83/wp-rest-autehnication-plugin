<?php
abstract class Controller {

    abstract static function getDbName();
    abstract static function getPrimaryKey();

    public static function returnResponse($resp) {
        $response = new stdClass;
        if(isset($resp->error)) {
            $response->errors = $resp->error;
            $response_code = 403;
        } else {
            $response->data = $resp;
            $response_code = 200;
        }
        return wp_send_json( $response, $response_code, 0 );
    }

    public static function index($request) {
        $resp = Database::get(static::getDbName());
		return self::returnResponse($resp);
	}

    public static function show($request) {
        $posts = $request->get_params();
        $resp = Database::getItem($posts, static::getDbName(), static::getPrimaryKey());
        return self::returnResponse($resp);
	}

    public static function insert($request) {
        $posts = $request->get_params();
        $resp = Database::insert($posts, static::getDbName());
        return self::returnResponse($resp);
	}

    public static function update($request) {
        $posts = $request->get_params();
        $resp = Database::update($posts, static::getDbName(), static::getPrimaryKey());
        return self::returnResponse($resp);
	}

    public static function delete($request) {
        $posts = $request->get_params();
        $resp = Database::delete($posts, static::getDbName(), static::getPrimaryKey());
        return self::returnResponse($resp);
	}
}