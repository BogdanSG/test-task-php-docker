<?php

require_once './vendor/autoload.php';

use Controllers\MainController;
use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\View\Simple;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\DI\FactoryDefault;

define("USERS_URL", 'http://users:8080');

$loader = new Loader();

$loader->registerNamespaces(
    [
        'Controllers' => __DIR__ . '/controllers/'
    ]
);

$loader->register();

$di = new FactoryDefault();

$di->set(
    "view",
    function () {
        $view = new Simple();
        $view->setViewsDir('./views/');
        $view->registerEngines(
            [
                '.volt' => function ($view, $di) {
                    return new Volt($view, $di);
                }
            ]
        );
        return $view;
    },
    true
);

try{

    $mainController = new MainController();

    $app = new Micro();

    $app->get(
        '/',
        [$mainController, 'indexAction']
    );

    $app->post(
        '/',
        [$mainController,'loginAction']
    );
    
    $app->handle();

}//try
catch (\Exception $ex){

    echo 'Exception: ', $ex->getMessage();

}//catch