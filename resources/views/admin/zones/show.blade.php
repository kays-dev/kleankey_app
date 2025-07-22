@extends('layouts.view')

@section("title", $zone->zone_name)
@section("main_title", "Consulter le secteur d'intervention — " . $zone->zone_name)

@section('page_actions')
<div class="return">
    <a href="{{ route('zones.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<div class="details">
    <p class="detail">Nom : <strong>{{ $zone->zone_name }}</strong></p>

    <p class="detail">Nombre de villes : <strong>{{ $cities->count() }}</strong></p>

    <p class="detail">Nombre de biens : <strong>{{ $estates->count() }}</strong></p>

    <p class="detail">Nombre d'agents : <strong>{{ $agents->count() }}</strong></p>
</div>

<div class="associated_details">
    <h3 class="details_title">
        Ville.s du secteur
    </h3>
    <div class="datas_list">
        @foreach ($cities as $city)
        <div class="list_item">
            <p><strong>{{ $city->city_name }}</strong></p>
            <p>{{ $city->region }}</p>
            <p>{{ $city->postcode }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection