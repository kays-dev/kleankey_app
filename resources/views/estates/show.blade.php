@extends('layouts.admin');

@section('content')

    <section class="estates_show">
        <div class="main_title">
            <h1>Consulter le bien — <strong>{{ $estate->estate_code }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('estates.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="estate_details">

                <h3 class="details_title">
                    Propriétaire
                </h3>
                <p class="details">{{ $owner->owner_name . ' ' . $owner->owner_surname }}</p>

                <h3 class="details_title">
                    Adresse
                </h3>
                <p class="details">
                    {{ $estate->estate_address }}
                </p>

                <h3 class="details_title">
                    Secteur affecté
                </h3>
                <p class="details">
                    {{ $zone->zone_name }}
                </p>

                <h3 class="details_title">
                    Type de bien
                </h3>
                <p class="details">
                    {{ $estate->estate_type }}
                </p>

                <h3 class="details_title">
                    Nombre de pièces
                </h3>
                <p class="details">
                    {{ $estate->rooms_number }}
                </p>

                <h3 class="details_title">
                    Surface (en m²)
                </h3>
                <p class="details">
                    {{ $estate->surface }}
                </p>

                <h3 class="details_title">
                    Agent.s intervenant
                </h3>
                <p class="details">
                    {{ $agents->pluck('agent_surname')->implode(', ') }}
                </p>

                <h3 class="details_title">
                    Prestations
                </h3>
                <p class="details">
                    {{ $services->pluck('service_name')->implode(' | ') }}
                </p>

            </div>
        </div>
    </section>

@endsection