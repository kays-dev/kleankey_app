<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;


Route::resource('agents', AgentController::class);
