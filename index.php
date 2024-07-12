<?php
use \App\Core\Mvc;
// tutte le classi necessarie con la singola dipendenza di compoeser col namespace 
require_once __DIR__.'/vendor/autoload.php';

// gestione delle rotte
$routes = include __DIR__.'/config/routes.php'; // gestone rotte

// il core dell'architettura MVC
$app = new Mvc($routes);