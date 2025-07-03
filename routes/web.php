<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

Route::resource('owners', OwnerController::class);
Route::resource('agents', AgentController::class);
Route::resource('zones', ZoneController::class);
Route::resource('cities', CityController::class);

// Route::get('/', [controller, 'function'])->name('route name');
