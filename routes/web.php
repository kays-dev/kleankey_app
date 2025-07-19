<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ZoneController;

use App\Http\Controllers\UserOwnerController;
use App\Http\Controllers\UserAgentController;

Route::resource('owners', OwnerController::class);
Route::resource('agents', AgentController::class);
Route::resource('zones', ZoneController::class);
Route::resource('cities', CityController::class);
Route::resource('estates', EstateController::class);
Route::resource('services', ServiceController::class);

// HOME
// Route::get('/', [controller, 'function'])->name('homepage');

// Authentification Admin


// Authentification User


// Routes Admin


// Routes User


    // Routes rôle Owner



    // Routes rôle Agent