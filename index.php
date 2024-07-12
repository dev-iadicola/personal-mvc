<?php


$richiesta = $_SERVER['REQUEST_URI'];

$routes = include __DIR__.'/config/routes.php'; // gestone rotte

require_once __DIR__.'/app/Core/Mvc.php';
require_once __DIR__.'/app/Core/Request.php';
require_once __DIR__.'/app/Core/Response.php';
require_once __DIR__.'/app/Core/Router.php';

$app = new Mvc($routes);