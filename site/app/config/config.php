<?php

use Phalcon\Loader;
use Phalcon\Mvc\View\Simple;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\DI\FactoryDefault;

$di = new FactoryDefault();

$di->set(
    "view",
    function () {
        $view = new Simple();
        $view->setViewsDir(__DIR__.'/../views/');
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

function loadDirs(){

    $loader = new Loader();

    $loader->registerNamespaces(
        [
            'Controllers' => __DIR__ . '/../controllers/',
            'Helpers' => __DIR__ . '/../helpers/',
            'Configs' => __DIR__ . '/../config/'
        ]
    );

    $loader->register();

}//loadDirs