<?php

namespace Helpers;

use JsonRPC\Client;

class UsersJsonRtc {

    const USERS_URL = 'http://users:8080';

    private static $client = null;

    public static function getClient(){

        if(!isset(self::$client))
            self::$client = new Client(self::USERS_URL);

        return self::$client;

    }//getClient

    public static function signIn($login, $password){

        return self::getClient()->execute('signin', ['login' => $login, 'password' => $password]);

    }//signIn

}//UsersJsonRtc