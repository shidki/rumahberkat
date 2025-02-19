<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\AuthController;


Route::post('/register/individu',[AuthController::class, 'registerIndividu']);
Route::post('/register/company',[AuthController::class, 'registerCompany']);
Route::post('/logout',[AuthController::class, 'registerCompany']);
