@extends('layouts.view')

@section('title', '{{ $zone->zone_name }}')
@section('main_title', 'Consulter le secteur d'intervention — <strong>{{ $zone->zone_name }}</strong>')

@section('page_actions')
<div class="return">
    <a href="{{ route('zones.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<p class="details">Nom : <strong>{{ $zone->zone_name }}</strong></p>

<p class="details">Nombre de villes : <strong>{{ $cities->count() }}</strong></p>

<p class="details">Nombre de biens : <strong>{{ $estates->count() }}</strong></p>

<p class="details">Nombre d'agents : <strong>{{ $agents->count() }}</strong></p>

<h3 class="details_zone_title">
    Villes
</h3>
<table class="zone_cities_list">
    <tr>
        <th>Nom</th>
        <th>Code postal</th>
        <th>Région</th>
    </tr>
    @foreach ($cities as $city)
    <tr>
        <td>{{ $city->city_name }}</td>
        <td>{{ $city->postcode }}</td>
        <td>{{ $city->region }}</td>
    </tr>
    @endforeach
</table>
@endsection