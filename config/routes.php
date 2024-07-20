<?php
use App\Controllers\ContattiController;
use App\Controllers\ErrorsController;
use App\Controllers\HomeController;
use App\Controllers\PortfolioController;

/**
 * Gestione delle routes riguardo le richiest http
 * 
 * il primo elemento dell'array è la tiplogia di richiesta
 * il secondo array associativo conterrà due valori:
 * 1. Il controller da utilizzare
 * 2. l'action del controller selezionato prima
 * 
 * il metodo di un controller per le rotte viene tecnicamente definitp 'action'
 * 
 * 
 */


return [

    //rotte disponibili per richiesta GET
    'get' => [
        '/' => [HomeController::class,'index'], //array contenente [0]Controller e [1] Metodo del controller prescelto
        '/contatti' => [ContattiController::class,'index'],
        '/portfolio' => [PortfolioController::class, 'index'],
        '/coming-soon' => [ErrorsController::class,'repair'],
    ],
    // rotte disponibili per rihiesta POST
    'post' =>[
        '/contatti' => [ContattiController::class,'sendForm'],
    ]


];
