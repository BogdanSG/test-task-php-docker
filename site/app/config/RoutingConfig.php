<?php


namespace Configs;

use Phalcon\Mvc\Micro\Collection;

class RoutingConfig {

    public static function getMainControllerRouter(){

        $routing = new Collection();
        $routing->setHandler('Controllers\MainController', true);

        $routing->get('/', 'indexAction');

        $routing->post('/', 'loginAction');

        return $routing;

    }//getMainControllerRouter

}//RoutingConfig