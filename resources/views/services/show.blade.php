@extends('layouts.admin');

@section('content')

    <section class="services_show">
        <div class="main_title">
            <h1>Consulter la prestation — <strong>{{ $service->service__name . " | " . $service->service_type }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('services.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="estate_details">

                <h3 class="details_title">
                    Intitulé de la prestation
                </h3>
                <p class="details">{{ $service->service_name }}</p>

                <h3 class="details_title">
                    Type de prestation
                </h3>
                <p class="details">
                    {{ $service->service_type }}
                </p>

                <h3 class="details_title">
                    Description de la prestation
                </h3>
                <p class="details">
                    {{ $service->description }}
                </p>

                <h3 class="details_title">
                    Durée recommandée
                </h3>
                <p class="details">
                    {{ $service->duration }}
                </p>

                <h3 class="details_title">
                    Agent assigné
                </h3>
                <p class="details">
                    {{ $agent->agent_surname . " " . $agent->agent_name }}
                </p>

                <h3 class="details_title">
                    Bien.s concerné.s
                </h3>
                <p class="details">
                    {{ $estates->pluck('estate_code')->implode(' | ') }}
                </p>

            </div>
        </div>
    </section>

@endsection