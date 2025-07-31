@extends('layouts.auth')

@section('title', 'Récap de connexion')

@section('connexion')
<x-auth-connection :route="'user.logout'" :action="'Déconnexion'" />
@endsection

@section('main_title', 'Est-ce bien vous ?')



@section('content')
<div class="recap">
    <!-- Nom complet -->
    <div class="recap_box">
        <span class="recap_detail">
            Votre nom complet — <strong>{{ $user->user_surname }} {{ $user->user_name }}</strong>
        </span>
    </div>

    <!-- Rôle -->
    <div class="recap_box">
        <span class="recap_detail">
            Votre statut — <strong>
                @if($user->role->value ==='agent')
                Agent d'entretien
                @else
                Propriétaire
                @endif
            </strong>
        </span>
    </div>

    <!-- Date d'inscription -->
    <div class="recap_box">
        <span class="recap_detail">
            Rejoint le — <strong>{{ $user->created_at->format('d/m/Y') }}</strong>
        </span>
    </div>
</div>

<div class="confirm_link">
    <a href="{{-- route('user.dashboard') --}}">
        Confirmer et accèder au tableau de bord
    </a>
</div>
</div>
@endsection