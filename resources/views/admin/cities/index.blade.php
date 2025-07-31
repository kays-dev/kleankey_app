@extends('layouts.table')

@section('title', 'Villes')
@section('main_title', 'Liste des villes')

@section('pages')
    <x-page-navigation :table="$cities"/>
@endsection

@section('page_actions')
<div class="return">
    <a href="{{ route('zones.index') }}" class="return_to_dashboard">Retour aux secteurs</a>
</div>
<div class="add_data">
    <div>
        <a href="{{ route('cities.create') }}"><img src="" alt="ajouter une ville" class="page_actions_button"></a>
    </div>
</div>
@endsection

@section('table_headers')
<th class="table_title">Code</th>
<th class="table_title">Nom</th>
<th class="table_title">Code postal</th>
<th class="table_title">Région</th>
<th class="table_title">Secteur</th>
@endsection

@section('table_rows')
@foreach ($cities as $city)
<tr class="table_content">
    <td class="table_data code">{{ $city->city_code}}</td>
    <td class="table_data name">{{ $city->city_name}}</td>
    <td class="table_data number">{{ $city->postcode}}</td>
    <td class="table_data name">{{ $city->region}}</td>
    <td class="table_data name">{{ $city->zone?->zone_name ?? '--'}}</td>
    <x-data-actions-component :resource="'cities'" :item="$city" primaryKey="city_code"/>
</tr>
@endforeach
@endsection