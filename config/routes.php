<?php

use App\Core\Services\Route;

use App\Controllers\HomeController;

use App\Controllers\Auth\AuthController;

use App\Controllers\Auth\TokenController;

use App\Controllers\Admin\DashBoardController;

use App\Controllers\Admin\MaintenanceController;
use App\Controllers\PostController;

// Guest Pages
Route::get('/', HomeController::class, 'index');
Route::get('/crud-operations', PostController::class,'index');
Route::post('/post-create', PostController::class,'create');
Route::post('/post-delete/{id}', PostController::class,'destroy');


// Auth
Route::get('/login', AuthController::class, 'index');
Route::get('/forgot', AuthController::class, 'forgotPassword');
Route::get('/sign-up', AuthController::class, 'signUp');
Route::get('/validate-pin/{token}', TokenController::class, 'pagePin');
Route::post('/login', AuthController::class, 'login');
Route::post('/forgot', TokenController::class, 'forgotPasswordToken');
Route::post('/sign-up', AuthController::class, 'registration');
Route::post('/token/change-password', TokenController::class, 'validatePin');

// Admin 
Route::get('/admin/dashboard', DashBoardController::class, 'index');
Route::get('/admin/logout', DashBoardController::class, 'logout');

// Administration Posts


// Administration maintenance
Route::get('/admin/settings', MaintenanceController::class, 'index');
Route::post('/admin/settings', MaintenanceController::class, 'submit');









// Restituisce l'array delle rotte
return Route::all();
