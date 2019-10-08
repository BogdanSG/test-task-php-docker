<?php

namespace Controllers;

use Models\Users;

class UsersControllerRPC {

    public function signin($login, $password) {

        try{

            return (boolean)Users::findFirst([
                'conditions' => 'login=:login: AND password=:password:',
                'bind' => ['login' => $login, 'password' => $password],
            ]);

        }//try
        catch (\Exception $ex){

            return false;

        }//catch

        
    }//signin

}//UsersController