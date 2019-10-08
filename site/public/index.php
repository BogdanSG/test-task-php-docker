<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/config/config.php';

use Phalcon\Mvc\Micro;
use Configs\RoutingConfig;

loadDirs();

try{

    $app = new Micro($di);

    $app->mount(RoutingConfig::getMainControllerRouter());

    $app->handle();

}//try
catch (\Exception $ex){

    echo 'Exception: ', $ex->getMessage();

}//catch