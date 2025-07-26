@extends('layouts.table')

@section('title', 'Biens')
@section('main_title', 'Liste des biens')

@section('page_actions')
<div class="return">
    <a href="{{-- route('homepage') --}}" class="return_to_dashboard">Retour au tableau de bord</a>
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

    <td class="table_data type">{{ ucfirst($estate->estate_type->value) . ' | T' . $estate->rooms_number }}</td>

    <td class="table_data name">{{ $estate->zone?->zone_name ?? '--'}}</td>

</tr>
@endforeach
@endsection