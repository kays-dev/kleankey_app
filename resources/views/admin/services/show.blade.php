@extends('layouts.view')

@section('title', $service->service_name)
@section('main_title', 'Consulter la prestation — ' . $service->service_name . ' | ' . ucfirst($service->service_type->value))

@section('page_actions')
<div class="return">
    <a href="{{ route('services.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<div class="details">
    <p class="detail"><strong>Intitulé de la prestation :</strong> {{ $service->service_name }}</p>

    <p class="detail"><strong>Type de prestation :</strong> {{ $service->service_type }}</p>

    <p class="detail"><strong>Durée recommandée :</strong> {{ $service->duration ?? '--'}} h</p>

    <p class="detail"><strong>Description de la prestation :</strong> {{ $service->description ?? '--' }}</p>

    <p class="detail"><strong>Agent assigné :</strong> {{ ($agent?->agent_surname ?? '--') . " " . ($agent?->agent_name ?? '--')}}</p>
</div>

<div class="associated_details">
    <h3 class="details_title">
        Bien.s concerné.s
    </h3>
    <div class="datas_list">
        @foreach ($estates as $estate)
        <div class="list_item">
            <p class="item_detail">{{ $estate?->estate_code ?? '' }}</p>
            <p class="item_detail">{{ $estate?->estate_address ?? ''}}</p>
            <p class="item_detail">{{ ucfirst($estate?->estate_type->value ?? '') }}</p>
            <p class="item_detail">T{{ $estate?->rooms_number ?? ''}}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection