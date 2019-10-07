<?php

require_once __DIR__.'/../models/Users.php';

class UsersController {

    public function signin($login, $password) {

        return Users::checkUserLoginPassword($login, $password);
        
    }//signin

}//UsersController