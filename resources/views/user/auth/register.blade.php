@extends('layouts.auth')

@section('title', 'Inscription')
@section('main_title', 'Bienvenue sur KleanKey !')

@section('content')
<form method="POST" action="{{ route('user.doregister') }}">
    @csrf

    <!-- E-mail -->
    <div class="form_input_box">
        <label for="email" class="form_input_label">Adresse email —</label>

        <div class="input_box">
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('user_mail') }}"
                required
                class="form_input">
        </div>
    </div>

    <!-- Mot de passe -->
    <div class="form_input_box">
        <label for="user_pwd" class="form_input_label">Mot de passe —</label>

        <div class="input_box">
            <input
                type="password"
                name="password"
                id="password"
                required
                class="form_input">
        </div>
    </div>

    <!-- Vérification du mot de passe -->
    <div class="form_input_box">
        <label for="password_verification" class="form_input_label">Confirmer le mot de passe —</label>

        <div class="input_box">
            <input
                type="password"
                name="password_verification"
                id="password_verification"
                required
                class="form_input">
        </div>
    </div>

    <!-- Bouton d'inscription -->
    <div class="form_input_box cta">
        <button
            type="submit"
            class="form_submit">
            S'inscrire
        </button>
    </div>

</form>

<!-- Se connecter -->
<div class="form_input_box link">
    <a href="{{ route('user.login') }}">
        Vous avez déjà un espace ? Connectez-vous !
    </a>
</div>
@endsection