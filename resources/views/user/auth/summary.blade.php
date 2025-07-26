@extends('layouts.auth')

@section('title', 'Récap de connexion')
@section('main_title', 'Est-ce bien vous ?')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-xl">

        <div class="grid grid-cols-1 gap-4">
            {{-- Nom complet --}}
            <div class="flex justify-between items-center">
                <span class="text-gray-600 font-medium">Nom complet :</span>
                <span class="text-gray-800">{{ $user->user_name }} {{ $user->user_surname }}</span>
            </div>

            {{-- Rôle --}}
            <div class="flex justify-between items-center">
                <span class="text-gray-600 font-medium">Statut :</span>
                <span class="text-gray-800 capitalize">{{ $user->role }}</span>
            </div>

            {{-- Date d'inscription --}}
            <div class="flex justify-between items-center">
                <span class="text-gray-600 font-medium">Rejoint le :</span>
                <span class="text-gray-800">
                    {{ $user->created_at->format('d/m/Y') }}
                </span>
            </div>
        </div>

        <div class="mt-8 text-right">
            <a href="{{ route('user.logout') }}"
                class="inline-block px-4 py-2 bg-red-600 text-white font-semibold rounded hover:bg-red-700">
                Se déconnecter
            </a>
        </div>
    </div>
</div>
@endsection