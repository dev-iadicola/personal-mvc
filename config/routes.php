<?php

use App\Controllers\Admin\DashBoardController;
use App\Controllers\Auth\AuthController;
use App\Controllers\Auth\TokenController;
use App\Controllers\ContattiController;
use App\Controllers\ErrorsController;
use App\Controllers\HomeController;
use App\Controllers\PortfolioController;
use App\Controllers\LawController;
use App\Controllers\ProgettiController;

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
        // Routes
        '/' => [HomeController::class,'index'], //array contenente [0]Controller e [1] Metodo del controller prescelto
        '/cookie' => [LawController::class,'cookie'],
        '/privacy-policy' => [LawController::class,'policy'],
        '/contatti' => [ContattiController::class,'index'],
        '/portfolio' => [PortfolioController::class, 'index'],
        '/progetti' => [ProgettiController::class,'index'],
        '/coming-soon' => [ErrorsController::class,'repair'],



        // Routes Auth
        '/login' => [AuthController::class,'index'],
        '/forgot' => [AuthController::class,'forgotPassword'],
        '/sign-up' => [AuthController::class,'signUp'],

        // Routes Admin
        '/admin/dashboard'=>[DashBoardController::class,'index'],

    ],
    // rotte disponibili per rihiesta POST
    'post' =>[
        '/contatti' => [ContattiController::class,'sendForm'],
        '/login' => [AuthController::class,'login'],
        '/forgot' => [TokenController::class,'forgotPasswordToken'], // 
        '/sign-up' => [AuthController::class,'registration'],

    ]


];
