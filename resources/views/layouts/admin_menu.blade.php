@extends('layouts.app')

@section('menu')
<li class="main_menu_item">
    <a href="{{route('admin.dashboard')}}" class="main_menu_links">Tableau de bord</a>
</li>
<li class="main_menu_item"><a href="{{ route('services.index')}}" class="main_menu_links">Planning</a></li>
<li class="main_menu_item"><a href="{{ route('estates.index')}}" class="main_menu_links">Biens</a></li>
<li class="main_menu_item"><a href="{{ route('owners.index')}}" class="main_menu_links">Propriétaires</a></li>
<li class="main_menu_item"><a href="{{ route('agents.index')}}" class="main_menu_links">Agents</a></li>
<li class="main_menu_item"><a href="{{ route('zones.index')}}" class="main_menu_links">Secteurs</a>
</li>
@endsection