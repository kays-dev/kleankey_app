<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    // =============== GESTION DES TENTATIVES DE CONNEXION
    use ThrottlesLogins;

    // Limite de tentatives de connexion
    protected function maxAttempts()
    {
        return 5; // 5 tentatives max
    }

    // Temps de blocage après 5 tentatives de connexion infructueuses
    protected function decayMinutes()
    {
        return 15; // Bloqué pendant 15 minutes
    }

    // Clé unique pour identifier l' Admin
    protected function throttleKey(Request $request)
    {
        return strtolower($request->input('email')) . '|' . $request->ip();
    }

    // =============== GESTION DE L'AUTHENTIFICATION

    // Affiche le formulaire de connexion
    public function login()
    {
        return view('admin.auth.login');
    }

    // Vérification en db de l'existence de l'Admin et authentification pour accès à l'application
    public function doLogin(Request $request)
    {
        // Vérifier si l'Admin est bloqué
        if ($this->hasTooManyLoginAttempts($request)) {

            $blockedTime = $this->limiter()->availableIn($this->throttleKey($request));
            $this->fireLockoutEvent($request);

            return back()->withErrors([
                'admin_mail' => 'Trop de tentatives. Réessayez dans ' . $blockedTime . ' secondes.',
            ]);
        }

        // Vérification et récupération des valeurs des inputs du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Authentifie l'Admin
        if (Auth::guard('admin')->attempt(
            [
                'admin_mail' => $credentials['email'],
                'admin_pwd' => $credentials['password']
            ],
            $request->boolean('remember') //Options "se souvenir de moi"
        )) {

            $request->session()->regenerate();

            $this->clearLoginAttempts($request); //Le nombre de tentatives de connexion retourne à 0

            return redirect()->intended(route('admin.logged'));
        }

        // Si l'authentification échoue, incrément du nombre de tentatives de connexion
        $this->incrementLoginAttempts($request);

        return back()->withErrors([
            'admin_mail' => 'Identifiants invalides.',
        ]);
    }

    // Confirmation de connexion de l'Admin
    public function logged()
    {
        // Récupère l'Admin connecté
        $admin = Auth::guard('admin')->user();

        return view('admin.summary', compact('admin'));
    }

    // Déconnexion : suppression de la session et accès à l'application refusé
    public function doLogout(Request $request)
    {
        // Déconnecte l'Admin connecté
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
