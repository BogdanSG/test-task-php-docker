<?php

namespace Controllers;

use Helpers\UsersJsonRtc;
use Phalcon\Mvc\Controller;

class MainController extends Controller {

    public function indexAction() {

        echo $this->view->render('main');
        
    }//indexAction
    
    public function loginAction() {

        $successLogin = false;

        if($this->request->get('login') && $this->request->get('password'))
            $successLogin = UsersJsonRtc::signIn($this->request->get('login'), $this->request->get('password'));

        echo $this->view->render('main', ['success' => $successLogin]);

    }//loginAction

}//MainController