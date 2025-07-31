<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{

    // =============== GESTION DE L'AUTHENTIFICATION

    // Affiche le formulaire de connexion
    public function login()
    {
        return view('admin.auth.login');
    }

    // Vérification en db de l'existence de l'Admin et authentification pour accès à l'application
    public function doLogin(Request $request)
    {
        // Vérification et récupération des valeurs des inputs du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Authentifie l'Admin
        if (Auth::guard('admin')->attempt(
            [
                'admin_mail' => $credentials['email'],
                'password' => $credentials['password']
            ],
            $request->boolean('remember') //Options "se souvenir de moi"
        )) {

            $request->session()->regenerate();

            return redirect()->intended(route('zones.index'));
        }

    }

    // Accès au tableau de bord de l'Admin
    public function dashboard()
    {
        // Récupère l'Admin connecté
        $admin = Auth::guard('admin')->user();

        return view('admin.auth.dashboard', compact('admin'));
    }

    // Déconnexion : suppression de la session et accès à l'application refusé
    public function logout(Request $request)
    {
        // Déconnecte l'Admin connecté
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
