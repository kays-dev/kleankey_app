<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;

use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\EstateController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ZoneController;

use App\Http\Controllers\User\Agent\AgentEstatesController;
use App\Http\Controllers\User\Agent\AgentServicesController;

use App\Http\Controllers\User\Owner\OwnerEstatesController;
use App\Http\Controllers\User\Owner\OwnerServicesController;
use App\Models\Admin;

// =============== HOME
// Route::get('/', [controller, 'function'])->name('homepage');

// =============== Routes Admin
Route::prefix('admin')->group(function () {

    // Routes d'authentification admin
    Route::middleware(['auth.redirected'])->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/dologin', [AdminAuthController::class, 'dologin'])->name('admin.dologin');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });


    // Routes protégées admin
    Route::middleware(['authAdmin'])->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('owners', OwnerController::class);
        Route::resource('agents', AgentController::class);
        Route::resource('zones', ZoneController::class);
        Route::resource('cities', CityController::class);
        Route::resource('estates', EstateController::class);
        Route::resource('services', ServiceController::class);
    });
});

// =============== Routes User
Route::prefix('user')->group(function () {

    // Routes d'authentification user
    //     Route::middleware(['auth.redirected'])->group(function () {
    Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
    Route::post('/dologin', [UserAuthController::class, 'dologin'])->name('user.dologin');
    Route::get('/summary', [UserAuthController::class, 'logged'])->name('user.logged');
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
    Route::get('/register', [UserAuthController::class, 'register'])->name('user.register');
    Route::post('/doregister', [UserAuthController::class, 'doregister'])->name('user.doregister');
    //     });

    Route::middleware(['auth'], ['role'])->group(function () {

        // Routes rôle Owner
        // Route::middleware(['access.owner'])->group(function () {
        // Route::get('/my-estates', [OwnerEstatesController::class, 'index'])->name('user.estates');
        // Route::get('/my-services', [OwnerServicesController::class, 'index'])->name('user.services');

        // Route::middleware(['this.estate.owner'])->group(function () {
        // Route::get('/show/{estate}', [OwnerEstatesController::class, 'show'])->name('user.single.estate');
        // });

        // Route::middleware(['this.estate.service'])->group(function () {
        // Route::get('/show/{service}', [OwnerServicesController::class, 'show'])->name('user.single.service');
        // });
        // });


        // Routes rôle Agent
        Route::middleware(['accessAgent'])->group(function () {
            Route::prefix('estates')->group(function () {
                Route::get('/list', [AgentEstatesController::class, 'managing'])->name('user.tended.estates');

                Route::prefix('estate')->middleware(['thisEstateAgent'])->group(function () {
                    Route::get('/show/{estate}', [AgentEstatesController::class, 'show'])->name('user.this.tended.estate');
                });
            });

            Route::prefix('services')->group(function () {
                Route::get('/list', [AgentServicesController::class, 'planning'])->name('user.planned.services');

                Route::middleware(['thisServiceAgent'])->group(function () {
                    Route::get('/show/{service}', [AgentServicesController::class, 'show'])->name('user.this.planned.service');
                });
            });
        });
    });
});
