@extends('layouts.admin');

@section('content')

    <section class="cities_show">
        <div class="main_title">
            <h1>Consulter la ville — <strong>{{ $city->city_name }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('cities.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="city_details">

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

            </div>
        </div>
    </section>

@endsection