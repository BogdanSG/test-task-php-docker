<?php

require_once __DIR__.'/../helpers/DB.php';

//псевдо модель Users для работы с таблицей users

class Users {

    public static function checkUserLoginPassword($login, $password) {

        return DB::querySingle("SELECT COUNT(user_id) FROM users WHERE login = '$login' AND password = '$password'") == 1 ? true : false;
        
    }//exec

}//Users