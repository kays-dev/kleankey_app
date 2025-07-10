@extends('layouts.view')

@section('title', '{{$city->city_name}}')
@section('main_title', 'Consulter la ville — <strong>{{ $city->city_name }}</strong>')

@section('page_actions')
<div class="return">
    <a href="{{ route('cities.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<h3 class="details_title">
    Nom
</h3>
<p class="details">{{ $city->city_name }}</p>

<h3 class="details_title">
    Code postal
</h3>
<p class="details">{{ $city->postcode }}</p>

<h3 class="details_title">
    Région
</h3>
<p class="details">{{ $city->region }}</p>

<h3 class="details_title">
    Secteur associé
</h3>
<p class="details">{{ $zone->zone_name }}</p>
@endsection