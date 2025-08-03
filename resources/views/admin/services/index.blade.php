@extends('layouts.table')

@section('title', 'Prestation')
@section('main_title', 'Liste des prestations')

@section('page_actions')
<div class="return">
    <a href="{{ route('admin.dashboard') }}" class="return_to_dashboard">Retour au tableau de bord</a>
</div>
<div class="add_data">
    <div>
        <a href="{{ route('services.create') }}"><img src="" alt="ajouter une prestation" class="page_actions_button"></a>
    </div>
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
    <x-data-actions-component :resource="'services'" :item="$service" primaryKey="service_id"/>
</tr>
@endforeach
@endsection