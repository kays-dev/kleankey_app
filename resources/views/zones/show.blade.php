@extends('layouts.admin');

@section('content')

    <section class="zones_show">
        <div class="main_title">
            <h1>Consulter le secteur d'intervention — <strong>{{ $zone->zone_name }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('zones.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="zone_details">

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

            </div>
        </div>
    </section>

@endsection