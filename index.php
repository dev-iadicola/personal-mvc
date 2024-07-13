<?php
/**
 * File entry point
 */
use \App\Core\Mvc;
use App\Core\Config;
// tutte le classi necessarie con la singola dipendenza di compoeser col namespace 
require_once __DIR__.'/vendor/autoload.php';

// gestione delle rotte
$routes = include __DIR__.'/config/routes.php'; // gestone rotte

Config::env(__DIR__.'/.env');

// istanza per la configurazione rotte
$config = Config::dir(__DIR__.'/config');
// var_dump($config);

// istanza Mvc che è il CORE dell'architettura MVC
(new Mvc($config))->run();