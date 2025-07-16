@extends('layouts.view')

@section('title', $owner->owner_surname . ' ' . $owner->owner_name)
@section('main_title', 'Consulter le propriétaire — ' . $owner->owner_surname . ' ' . $owner->owner_name)

@section('page_actions')
<div class="return">
    <a href="{{ route('owners.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('details')
<div class="details">
    <p class="detail">Nom complet : <strong>{{ $owner->owner_name . ' ' . $owner->owner_surname }}</strong></p>

    <p class="detail">Adresse : <strong>{{ $owner->owner_address }}</strong></p>

    <p class="detail">Adresse mail : <strong>{{ $owner->owner_mail }}</strong></p>

    <p class="detail">Numéro de téléphone : <strong>{{ $owner->owner_tel }}</strong></p>
</div>

<div class="associated_details">
    <h3 class="details_title">
        Bien.s en gestion
    </h3>
    <div class="datas_list">
        @foreach ($estates as $estate)
        <div class="list_item">
            <p class="item_detail"><strong>{{ $estate?->estate_code ?? ''}}</strong></p>
            <p class="item_detail">{{ ucfirst($estate?->estate_type->value ?? '') }}</p>
            <p class="item_detail">T{{ $estate?->rooms_number ?? '' }}</p>
            <p class="item_detail">{{ $estate?->estate_address ?? '' }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection