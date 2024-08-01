<?php

use App\Core\Services\Route;
use App\Controllers\LawController;
use App\Controllers\HomeController;
use App\Controllers\ErrorsController;
use App\Controllers\ContattiController;
use App\Controllers\ProgettiController;
use App\Controllers\Auth\AuthController;
use App\Controllers\PortfolioController;
use App\Controllers\Auth\TokenController;
use App\Controllers\Admin\DashBoardController;
use App\Controllers\Admin\PortfolioController as AdminPortfolio;


// Registra le rotte GET
Route::get('/', HomeController::class, 'index');
Route::get('/cookie', LawController::class, 'cookie');
Route::get('/privacy-policy', LawController::class, 'policy');
Route::get('/contatti', ContattiController::class, 'index');
Route::get('/portfolio', PortfolioController::class, 'index');
Route::get('/progetti', ProgettiController::class, 'index');
Route::get('/coming-soon', ErrorsController::class, 'repair');
Route::get('/login', AuthController::class, 'index');
Route::get('/forgot', AuthController::class, 'forgotPassword');
Route::get('/sign-up', AuthController::class, 'signUp');
Route::get('/validate-pin/{token}', TokenController::class, 'pagePin');
Route::get('/admin/dashboard', DashBoardController::class, 'index');
Route::get('/admin/logout', DashBoardController::class, 'logout');
Route::get('/admin/portfolio', AdminPortfolio::class, 'index');

// Registra le rotte POST
Route::post('/contatti', ContattiController::class, 'sendForm');
Route::post('/login', AuthController::class, 'login');
Route::post('/forgot', TokenController::class, 'forgotPasswordToken');
Route::post('/sign-up', AuthController::class, 'registration');
Route::post('/token/change-password', TokenController::class, 'validatePin');

// Restituisce l'array delle rotte
return Route::all();
