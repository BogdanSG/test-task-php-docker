<?php

require_once './vendor/autoload.php';
require_once './controllers/UsersController.php';

use JsonRPC\Server;

$server = new Server();

$procedureHandler = $server->getProcedureHandler();

$procedureHandler->withClassAndMethod('signin', 'UsersController');

echo $server->execute();