@extends('layouts.auth')

@section('title', 'Connexion')
@section('main_title', 'Ravie de vous revoir !')

@section('content')
<form method="POST" action="{{ route('user.dologin') }}">
    @csrf

    <!-- E-mail -->
    <div class="form_input_box">
        <label for="email" class="form_input_label">Adresse email —</label>

        <div class="input_box">
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="form_input">
        </div>
    </div>

    <!-- Mot de passe -->
    <div class="form_input_box">
        <label for="password" class="form_input_label">Mot de passe —</label>

        <div class="input_box">
            <input
                type="password"
                name="password"
                id="password"
                required
                class="form_input">
        </div>
    </div>

    <!-- Se souvenir de moi -->
    <div class="form_input_box remember">
        <input type="checkbox" name="remember" id="remember" class="checkbox">
        <label for="remember" class="form_input_label">Se souvenir de moi</label>
    </div>


    <!-- Bouton de connexion -->
     <div class="form_input_box cta">
         <button
             type="submit"
             class="form_submit">
             Se connecter
         </button>
     </div>

    </form>

    <!-- S'inscrire -->
    <div class="form_input_box link">
        <a href="{{route('user.register')}}">Je n'ai pas de compte mais je souhaite m’inscrire !</a>
    </div>

@endsection