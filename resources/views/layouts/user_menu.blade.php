@extends('layouts.app')

@section('menu')

@if ($user->role->value === 'agent')
    <li class="main_menu_item">
        <a href="#" class="main_menu_links">Mon tableau de bord</a>
    </li>
    <li class="main_menu_item">
        <a href="{{ route('user.planned.services')}}" class="main_menu_links">Mon planning</a>
    </li>
    <li class="main_menu_item">
        <a href="{{ route('user.tended.estates')}}" class="main_menu_links">Mes prestations</a>
    </li>

@elseif ($user->role->value === 'owner')
    <li class="main_menu_item">
        <a href="#" class="main_menu_links">Mon tableau de bord</a>
    </li>
    <li class="main_menu_item">
        <a href="{{ route('user.services')}}" class="main_menu_links">Mon planning</a>
    </li>
    <li class="main_menu_item">
        <a href="{{ route('user.estates')}}" class="main_menu_links">Mes biens</a>
    </li>
@endif

@endsection
