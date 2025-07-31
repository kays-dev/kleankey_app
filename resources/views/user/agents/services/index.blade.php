@extends('layouts.table')

@section('title', 'Prestation')
@section('main_title', 'Liste des prestations')

@section('page_actions')
<div class="return">
    <a href="{{-- route('homepage') --}}" class="return_to_dashboard">Retour au tableau de bord</a>
</div>
@endsection

@section('table_headers')
<th class="table_title">Intitulé</th>
<th class="table_title">Type</th>
<th class="table_title">Durée</th>
@endsection

@section('table_rows')
@foreach ($services as $service)
<tr class="table_content">
    <td class="table_data name">{{ $service->service_name }}</td>

    <td class="table_data type">{{ ucfirst($service->service_type->value)}}</td>

    <td class="table_data number">{{ $service->duration ?? '--' }} h</td>
    <td class="data_actions table_data">
        <div class="data_buttons">
            <div class="data_button">
                <a href="{{ route('user.this.planned.service', $service->service_id) }}">
                    <img src="{{ asset('images/icons/view.svg') }}" alt="Consulter">
                </a>
            </div>
    </td>
@endforeach
@endsection