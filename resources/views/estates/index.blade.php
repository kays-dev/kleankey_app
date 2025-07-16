@extends('layouts.table')

@section('title', 'Biens')
@section('main_title', 'Liste des biens')

@section('page_actions')
<div class="return">
    <a href="{{-- route('homepage') --}}" class="return_to_dashboard">Retour au tableau de bord</a>
</div>
<div class="add_data">
    <div>
        <a href="{{ route('estates.create') }}"><img src="" alt="ajouter un bien" class="page_actions_button"></a>
    </div>
</div>
@endsection

@section('table_headers')
<th class="table_title">Code</th>
<th class="table_title">Propriétaire</th>
<th class="table_title">Adresse </th>
<th class="table_title">Caractéristiques</th>
<th class="table_title">Secteur</th>
<th class="table_title">Prestataire affecté</th>
@endsection

@section('table_rows')
@foreach ($estates as $estate)
<tr class="table_content">
    <td class="table_data code">{{ $estate->estate_code }}</td>

    <td class="table_data name">{{ $estate->owner->owner_surname . ' ' . $estate->owner->owner_name}}</td>

    <td class="table_data address">{{ $estate->estate_address }}</td>

    <td class="table_data type">{{ ucfirst($estate->estate_type->value) . ' | ' . $estate->rooms_number }}</td>

    <td class="table_data name">{{ $estate->zone?->zone_name ?? '--'}}</td>

    <td class="table_data type">{{ $estate->agents?->pluck('agent_surname')->implode(', ') ?? '--'}}</td>
    <x-data-actions-component :resource="'estates'" :item="$estate" primaryKey="estate_code"/>
</tr>
@endforeach
@endsection