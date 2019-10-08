<?php

namespace Models;

use Phalcon\Mvc\Model;

class Users extends Model {

    const source = 'users';

    public $user_id;

    public $login;

    public $password;

    public function initialize() {

        $this->setSource(self::source);

    }//initialize

    public function getSource() {

        return self::source;

    }//getSource

    public static function find($parameters = null) {

        return parent::find($parameters);

    }//find

    public static function findFirst($parameters = null) {

        return parent::findFirst($parameters);

    }//findFirst

}//Users
