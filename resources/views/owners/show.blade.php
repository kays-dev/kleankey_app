@extends('layouts.view')

@section('title', $owner->surname . ' ' . $owner->name)
@section('main_title', 'Consulter le propriétaire — ' . $owner->surname . ' ' . $owner->name)

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
            <p><strong>{{ $estate->estate_code }}</strong></p>
            <p>{{ $estate->estate_type }}</p>
            <p>{{ $estate->rooms_number }}</p>
            <p>{{ $estate->estate_address }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection