<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;

use App\Http\Controllers\Admin\DashboardController;
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

// =============== HOME
// Route::get('/', [controller, 'function'])->name('homepage');

// // Authentification User
// Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
// Route::post('/dologin', [UserAuthController::class, 'dologin'])->name('user.dologin');
// Route::get('/register', [UserAuthController::class, 'register'])->name('user.login');
// Route::post('/doregister', [UserAuthController::class, 'doregister'])->name('user.dologin');


// =============== Routes Admin
// Route::prefix('admin')->group(function () {

//     // Routes d'authentification admin
//     Route::middleware(['auth.redirected'])->group(function () {
//         Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
//         Route::post('/admin/dologin', [AdminAuthController::class, 'dologin'])->name('admin.dologin');
//     });

        // Routes protégées admin
        // Route::middleware(['auth.admin'])->group(function (){
            Route::resource('owners', OwnerController::class);
            Route::resource('agents', AgentController::class);
            Route::resource('zones', ZoneController::class);
            Route::resource('cities', CityController::class);
            Route::resource('estates', EstateController::class);
            Route::resource('services', ServiceController::class);
        // });
// });

// =============== Routes User
// Route::prefix('user')->group(function () {

    // Routes d'authentification user
//     Route::middleware(['auth.redirected'])->group(function () {
//         Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
//         Route::post('/dologin', [UserAuthController::class, 'dologin'])->name('user.dologin');
//         Route::get('/register', [UserAuthController::class, 'register'])->name('user.login');
//         Route::post('/doregister', [UserAuthController::class, 'doregister'])->name('user.dologin');
//     });

//     Route::middleware(['auth', 'role'])->group(function () {
        // Routes rôle Owner
            // Route::middleware(['access.owner'])->group(function () {
            //     Route::middleware(['this.owner.estate'])->group(function () {
            //          Route::get('/my-estates', [UserEstateController::class, 'myEstates'])->name('user.my-estates');
            //     });
            // });


        // Routes rôle Agent
            //     Route::middleware(['access.agent'])->group(function () {
            //     Route::get('/my-estates', [UserEstateController::class, 'myEstates'])->name('user.my-estates');
            // });
            
        // });
// });