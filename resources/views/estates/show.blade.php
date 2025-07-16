@extends('layouts.view')

@section('title', $estate->estate_code)
@section('main_title', 'Consulter le bien — ' . $estate->estate_code)

@section('page_actions')
<div class="return">
    <a href="{{ route('estates.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<div class="details">
    <p class="detail">Propriétaire : <strong>{{ $owner->owner_name . ' ' . $owner->owner_surname }}</strong></p>

    <p class="detail">Adresse du bien : <strong>{{ $estate->estate_address }}</strong></p>

    <p class="detail">Type de bien : <strong>{{ ucfirst($estate->estate_type->value) }}</strong></p>

    <p class="detail">Nombre de pièces : <strong>{{ $estate->rooms_number }}</strong></p>

    <p class="detail">Surface (en m²) : <strong>{{ $estate->surface }} m²</strong></p>

    <p class="detail">Secteur affecté : <strong>{{ $zone?->zone_name ?? '--' }}</strong></p>
</div>

<div class="associated_details">
    <h3 class="details_title">
        Agent.s intervenant.s
    </h3>
    <div class="datas_list">
        @foreach ($agents as $agent)
        <div class="list_item">
            <p class="item_detail"><strong>{{ $agent?->agent_surname ?? '' . ' ' . $agent?->agent_name ?? ''}}</strong></p>
            <p class="item_detail">{{ $agent->zone }}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="associated_details">
    <h3 class="details_title">
        Prestation.s
    </h3>
    <div class="datas_list">
        @foreach ($services as $service)
        <div class="list_item">
            <p class="item_detail"><strong>{{ $service?->service_name ?? '' }}</strong></p>
            <p class="item_detail">{{ ucfirst($service?->service_type->value ?? '') }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection