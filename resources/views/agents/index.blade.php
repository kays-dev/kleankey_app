@extends('layouts.table')

@section('title', 'Agents d'entretien')
@section('main_title', 'Liste des agents')

@section('page_actions')
<div class="return">
    <a href="{{-- route('homepage') --}}" class="return_to_dashboard">Retour au tableau de bord</a>
</div>
<div class="add_data">
    <div>
        <a href="{{ route('agents.create') }}"><img src="" alt="ajouter un prestataire" class="page_actions_button"></a>
    </div>
</div>
@endsection

@section('table_headers')
<th class="table_title">Secteur</th>
<th class="table_title">Nom complet</th>
<th class="table_title">Email</th>
<th class="table_title">Téléphone</th>
<th class="table_title">Biens affectés</th>
@ensection

@section('table_rows')
@foreach ($agents as $agent)
<tr class="table_content">
    <td class="table_data">{{ $agent->zone->zone_name}}</td>
    <td class="table_data_first">{{ $agent->agent_surname . ' ' . $agent->agent_name }}</td>
    <td class="table_data">{{ $agent->agent_mail}}</td>
    <td class="table_data">{{ $agent->agent_tel}}</td>
    <td class="table_data">{{ $agent->estates->estate_code}}</td>
    <x-data-actions-component :resource="'agents'" :item="$agent" primaryKey="agent_id"/>
</tr>
@endforeach
@endsection