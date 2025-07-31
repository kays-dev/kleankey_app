@extends('layouts.view')

@section('title', $service->service__name)
@section('main_title', 'Consulter la prestation — ' . $service->service_name . ' | ' . ucfirst($service->service_type->value))

@section('page_actions')
<div class="return">
    <a href="{{ route('services.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<div class="details">
    <p class="detail">Intitulé de la prestation : <strong>{{ $service->service_name }}</strong></p>

    <p class="detail">Type de prestation : <strong>{{ $service->service_type }}</strong></p>

    <p class="detail">Durée recommandée : <strong>{{ $service->duration ?? '--'}} h</strong></p>

    <p class="detail">Description de la prestation : <strong>{{ $service->description ?? '--' }}</strong></p>
</div>

@endsection