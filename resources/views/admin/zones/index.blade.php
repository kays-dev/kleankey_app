@extends('layouts.table')

@section('title', 'Secteurs')
@section('main_title', 'Liste des secteurs')

@section('pages')
    <x-page-navigation :table="$zones"/>
@endsection

@section('page_actions')
<div class="return">
    <a href="{{ route('admin.dashboard') }}" class="return_to_dashboard">Retour au tableau de bord</a>
</div>
<div class="add_data">
    <div>
        <a href="{{ route('zones.create') }}"><img src="" alt="ajouter un secteur" class="page_actions_button"></a>
    </div>
</div>
<div class="show_other_datas">
    <div>
        <a href="{{ route('cities.index') }}"><img src="" alt="consulter les villes" class="page_actions_button"></a>
    </div>
</div>
@endsection

@section('table_headers')
<th class="table_title">Nom</th>
<th class="table_title">Villes</th>
<th class="table_title">Régions</th>
@endsection

@section('table_rows')
@foreach ($zones as $zone)
<tr class="table_content">
    <td class="table_data">{{ $zone->zone_name}}</td>
    <td class="table_data">
        {{ $zone->cities->pluck('city_name')->implode(', ') }}
    </td>
    <td class="table_data">
        {{ $zone->cities->pluck('region')->unique()->implode(', ') }}
    </td>
    <x-data-actions-component :resource="'zones'" :item="$zone" primaryKey="zone_id"/>
</tr>
@endforeach
@endsection