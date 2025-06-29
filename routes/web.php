<?php

use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

Route::resource('owners', OwnerController::class);

// Route::get('/', [controller, 'function'])->name('route name');
