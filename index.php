<?php

/* $richiesta = $_SERVER['REQUEST_URI'];

$requestUri = match($richiesta){
     '/' =>'Home Page',
   '/ciao' => 'ciao a te!',
   default => $richiesta . ' Page',
}; 
echo $requestUri;
*/
$richiesta = $_SERVER['REQUEST_URI'];

$routes = include __DIR__.'/config/routes.php';
// var_dump($routes);

require_once __DIR__.'/app/Core/Mvc.php';
require_once __DIR__.'/app/Core/Request.php';
require_once __DIR__.'/app/Core/Response.php';
require_once __DIR__.'/app/Core/Router.php';

$app = new Mvc($routes);