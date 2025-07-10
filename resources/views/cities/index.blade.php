@extends('layouts.table')

@section('title', 'Villes')
@section('main_title', 'Liste des villes')

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
    <td class="table_data">{{ $city->city_code}}</td>
    <td class="table_data">{{ $city->city_name}}</td>
    <td class="table_data">{{ $city->postcode}}</td>
    <td class="table_data">{{ $city->region}}</td>
    <td class="table_data">{{ $city->zone->zone_name}}</td>
    <td class="data_actions">

        <div class="data_button">
            <a href="{{ route( 'cities.show', $city->city_code) }}">
                <img src="{{ asset('images/icons/view.svg') }}" alt="Consulter">
            </a>
        </div>

        <div class="data_button">
            <a href="{{ route('cities.edit', $city->city_code) }}">
                <img src="{{ asset('images/icons/edit.svg') }}" alt="Modifier">
            </a>
        </div>

        <div class="data_button">
            <form action="{{ route('cities.destroy', $city->city_code) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="">
                    <img src="{{ asset('images/icons/delete.svg') }}" alt="Supprimer">
                </button>
            </form>
        </div>

    </td>
</tr>
@endforeach
@endsection