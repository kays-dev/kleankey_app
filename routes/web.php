<?php

use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

Route::resource('owners', OwnerController::class);
Route::resource('agents', AgentController::class);

// Route::get('/', [controller, 'function'])->name('route name');
