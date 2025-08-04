@extends('layouts.view')

@section('title', $agent->surname . ' ' . $agent->agent_name)
@section('main_title', "Consulter l'agent d'entretien — " . $agent->agent_surname . ' ' . $agent->agent_name)

@section('page_actions')
<div class="return">
    <a href="{{ route('agents.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<div class="details">
    <p class="detail">Nom complet : <strong>{{ $agent->agent_name . ' ' . $agent->agent_surname }}</strong></p>

    <p class="detail">Adresse : <strong>{{ $agent->agent_address }}</strong></p>

    <p class="detail">Adresse mail : <strong>{{ $agent->agent_mail }}</strong></p>

    <p class="detail">Numéro de téléphone : <strong>{{ $agent->agent_tel }}</strong></p>

    <p class="detail">Zone attribuée : <strong>{{ $agent->zone?->zone_name ?? '--' }}</strong></p>
</div>

<div class="associated_details">
    <h3 class="details_title">
        Bien.s affecté.s
    </h3>
    <div class="datas_list">
        @foreach ($estates as $estate)
        <div class="list_item">
            <p class="item_detail"><strong>{{ $estate?->estate_code ?? '' }}</strong></p>
            <p class="item_detail">{{ ucfirst($estate?->estate_type->value ?? '') }}</p>
            <p class="item_detail">T{{ $estate?->rooms_number ?? '' }}</p>
            <p class="item_detail">{{ $estate?->estate_address ?? '' }}</p>
            <p class="item_detail">{{ $estate?->services?->pluck('service_name')->implode(', ') ?? '' }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection