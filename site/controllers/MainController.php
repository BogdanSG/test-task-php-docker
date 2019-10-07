<?php

namespace Controllers;

use Phalcon\Mvc\Controller;
use JsonRPC\Client;

class MainController extends Controller {

    public static function getDataRequest($request){

        return (object)array_merge($request->get(), (array)$request->getJsonRawBody());

    }//getDataRequest

    public function indexAction() {

        echo $this->view->render('main');
        
    }//indexAction
    
    public function loginAction() {

        $req = self::getDataRequest($this->request);
        $successLogin = false;

        if(isset($req->login) && isset($req->password)){

            $client = new Client(USERS_URL);
            $successLogin = $client->execute('signin', ['login' => $req->login, 'password' => $req->password]);

        }//if

        echo $this->view->render('main', ['success' => $successLogin]);

    }//loginAction

}//MainController