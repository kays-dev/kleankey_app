@extends('layouts.table')

@section('title', 'Propriétaires')
@section('main_title', 'Liste des propriétaires')

@section('page_actions')
<div class="return">
    <a href="{{-- route('homepage') --}}" class="return_to_dashboard">Retour au tableau de bord</a>
</div>
<div class="add_data">
    <div>
        <a href="{{ route('owners.create') }}"><img src="" alt="ajouter un client" class="page_actions_button"></a>
    </div>
</div>
@endsection

@section('table_headers')
<th class="table_title">Prénom</th>
<th class="table_title">Nom</th>
<th class="table_title">Adresse</th>
<th class="table_title">Email</th>
<th class="table_title">Téléphone</th>
@ensection

@section('table_rows')
@foreach ($owners as $owner)
<tr class="table_content">
    <td class="table_data_first">{{ $owner->owner_surname}}</td>
    <td class="table_data">{{ $owner->owner_name}}</td>
    <td class="table_data">{{ $owner->owner_address}}</td>
    <td class="table_data">{{ $owner->owner_mail}}</td>
    <td class="table_data">{{ $owner->owner_tel}}</td>
    <x-data-actions-component :resource="'owners'" :item="$owner" />
</tr>
@endforeach
@endsection