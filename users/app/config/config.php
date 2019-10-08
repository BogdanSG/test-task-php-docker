<?php

use Phalcon\Loader;
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Sqlite as SqliteAdapter;
use Phalcon\Config\Adapter\Ini as ConfigIni;

$config = new ConfigIni(__DIR__.'/config.ini');

$di = new FactoryDefault();

$di->set('db', function () use ($config) {
    return new SqliteAdapter([
        "dbname" => $config->database->dbname
    ]);
});

function loadDirs(){

    $loader = new Loader();

    $loader->registerNamespaces(
        [
            'Controllers' => __DIR__ . '/../controllers/',
            'Helpers' => __DIR__ . '/../helpers/',
            'Configs' => __DIR__ . '/../config/',
            'Models' => __DIR__ . '/../models/',
        ]
    );

    $loader->register();

}//loadDirs