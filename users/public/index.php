<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/config/config.php';

use Phalcon\Mvc\Micro;
use Controllers\UsersControllerRPC;
use JsonRPC\Server;

loadDirs();

try{

    $app = new Micro($di);

    $app->post(
        "/",
        function () {
            $server = new Server();
            $procedureHandler = $server->getProcedureHandler();
            $procedureHandler->withObject(new UsersControllerRPC());
            echo $server->execute();
        }
    );

    $app->handle();

}//try
catch (\Exception $ex){

    echo 'Exception: ', $ex->getMessage();

}//catch