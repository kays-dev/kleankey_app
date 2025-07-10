@extends('layouts.view')

@section('title', '{{ $agent->surname . ' ' . $agent->name  }}')
@section('main_title', 'Consulter l'agent d'entretien — <strong>{{ $agent->surname . ' ' . $agent->name  }}</strong>')

@section('page_actions')
<div class="return">
    <a href="{{ route('agents.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<h3 class="details_title">
    Nom complet
</h3>
<p class="details">{{ $agent->agent_name . ' ' . $agent->agent_surname }}</p>

<h3 class="details_title">
    Adresse
</h3>
<p class="details">
    {{ $agent->agent_address }}
</p>

<h3 class="details_title">
    Adresse mail
</h3>
<p class="details">
    {{ $agent->agent_mail }}
</p>

<h3 class="details_title">
    Numéro de téléphone
</h3>
<p class="details">
    {{ $agent->agent_tel }}
</p>

<h3 class="details_title">
    Zone attribuée
</h3>
<p class="details">
    {{ $agent->zone->zone_name }}
</p>

<h3 class="details_title">
    Liste des biens affectés :
</h3>
<table class="agent_estate_list">
    <tr>
        <th>Code bien</th>
        <th>Type</th>
        <th>Nombre de pièces</th>
        <th>Adresse</th>
        <th>Prestation</th>
    </tr>
    @foreach ($estates as $estate)
    <tr>
        <td>{{ $estate->estate_code }}</td>
        <td>{{ $estate->estate_type }}</td>
        <td>{{ $estate->room_number }}</td>
        <td>{{ $estate->estate_address }}</td>
        <td>{{ $estate->services }}</td>
    </tr>
    @endforeach
</table>
@endsection