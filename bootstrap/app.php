<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as AuthenticateMiddleware;
// use App\Http\Middleware\Auth\AuthenticateAdmin as AuthenticateAdminMiddleware;
// use  App\Http\Middleware\Auth\RedirectIfAuthenticated as RedirectedMiddleware;
use App\Http\Middleware\User\CheckRole as RoleMiddleware;
use App\Http\Middleware\User\Agent\AccessToAgentOnly as AgentAccessMiddleware;
use App\Http\Middleware\User\Owner\AccessToOwnerOnly as OwnerAccessMiddleware;
use App\Http\Middleware\User\Owner\EstateBelongsToOwner;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // =============== Middlewares d'authentification
        // $middleware->alias('auth', AuthenticateMiddleware::class); //pour le guard 'web'
        // $middleware->alias('auth.admin', AuthenticateAdminMiddleware::class); //pour le guard 'admin'
        // $middleware->alias('auth.redirected', RedirectedMiddleware::class); //redirection selon guard

        // =============== Middleware de rôle
        // $middleware->alias('role', RoleMiddleware::class); //vérifie que l'utilisateur a un rôle

        // =============== Middlewares d'accès aux ressources
        // $middleware->alias('access.agent', AgentAccessMiddleware::class); //autorise l'accès à un utilisateur de rôle 'agent'
        // $middleware->alias('access.owner', OwnerAccessMiddleware::class); //autorise l'accès à un utilisateur de rôle 'owner'
        // $middleware->alias('this.owner.estate', EstateBelongsToOwner::class); //autorise l'accès à un bien seulement à l''owner' correspondant
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
