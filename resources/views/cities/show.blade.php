@extends('layouts.view')

@section('title', $city->city_name)
@section('main_title', 'Consulter la ville — ' . $city->city_name)

@section('page_actions')
<div class="return">
    <a href="{{ route('cities.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<div class="details">
    <p class="detail">Nom : <strong>{{ $city->city_name }}</strong></p>

    <p class="detail">Code postal : <strong>{{ $city->postcode }}</strong></p>

    <p class="detail">Région : <strong>{{ $city->region }}</strong></p>

    <p class="detail">Secteur associé : <strong>{{ $zone->zone_name }}</strong></p>
</div>
@endsection