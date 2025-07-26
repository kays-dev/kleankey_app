<?php

namespace App\Http\Controllers\Auth;

use App\Models\Agent;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class UserAuthController extends Controller
{


    // =============== GESTION DE L'AUTHENTIFICATION

    // Affiche le formulaire de connexion
    public function login()
    {
        return view('user.auth.login');
    }

    // Vérification en db de l'existence du User et authentification pour accès à l'application
    public function doLogin(Request $request)
    {

        // Vérification et récupération des valeurs des inputs du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Debug des credentials envoyés à attempt()
        $attemptCredentials = [
            'user_mail' => $credentials['email'],
            'password' => $credentials['password']
        ];
        Log::info('Attempt credentials: ', $attemptCredentials);

        // Authentifie le User
        if (Auth::guard('web')->attempt(
            [
                'user_mail' => $credentials['email'],
                'password' => $credentials['password']
            ],
            $request->boolean('remember') //Options "se souvenir de moi"
        )) {

            $request->session()->regenerate();

            return redirect()->intended(route('user.logged'));
        }

        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ]);
    }

    // Confirmation de connexion du User
    public function logged()
    {
        // Récupère le User connecté
        $user = Auth::guard('web')->user();

        return view('user.auth.summary', compact('user'));
    }

    // Déconnexion : suppression de la session et accès à l'application refusé
    public function logout(Request $request)
    {
        // Déconnecte le User connecté
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }

    // =============== GESTION DE LA CREATION D'UN USER

    // Affiche le formulaire d'inscription
    public function register()
    {
        return view('user.auth.register');
    }

    // Enregistre le User avec un rôle
    public function doRegister(Request $request)
    {
        // Vérification et récupération des valeurs des inputs du formulaire d'inscription
        $validated = $request->validate([
            'email' => 'required|email|unique:users,user_mail',
            'password' => 'required|confirmed:password_verification|min:8',
            'password_verification' => 'required',
        ]);

        $email = $validated['email'];

        // Vérification dans la table agents
        $agent = Agent::where('agent_mail', $email)->first();

        // Vérification dans la table owners
        $owner = Owner::where('owner_mail', $email)->first();

        // Autorisation d'incription à l'application seulement en cas de correspondance dans la table agents ou la table owners
        if (!$agent && !$owner) {
            return back()->withErrors([
                'email' => "Vous n'êtes pas autorisé à créer un compte.",
            ]);
        }

        // Autorisation d'inscription à l'application seulement si l'adresse mail renseignée est inexistante dans la table users
        if (User::where('user_mail', $email)->exists()) {
            return back()->withErrors([
                'email' => 'Cet email est déjà utilisé.',
            ]);
        }

        // Détermine le rôle du User en fonction de la table d’origine
        $role = $owner ? 'owner' : 'agent';

        // Détermine le nom du User en fonction de la table d’origine
        $name = $owner ? $owner->owner_name : $agent->agent_name;

        // Détermine le prénom du User en fonction de la table d’origine
        $surname = $owner ? $owner->owner_surname : $agent->agent_surname;

        // Créer le compte utilisateur avec le rôle
        $user = User::create([
            'user_name' => $name,
            'user_surname' => $surname,
            'user_mail' => $validated['email'],
            'user_pwd' => Hash::make($validated['password']),
            'role' => $role,
        ]);

        // Relation OneToOne : enregistre l'id du User créé dans la table correspondant au rôle
        if ($role === 'owner') {
            $owner->user_id = $user->user_id;
            $owner->save();
        } else {
            $agent->user_id = $user->user_id;
            $agent->save();
        }

        return redirect()->route('user.login')->with('success', 'Compte créé, vous pouvez maintenant vous connecter.');
    }
}
