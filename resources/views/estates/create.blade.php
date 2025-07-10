@extends('layouts.form')

@section('title', 'Nouveau bien')
@section('main_title', 'Ajouter un bien')

@section('page_actions')
<div class="return">
    <a href="{{ route('estates.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<p class="important">Veuillez remplir tous les champs. Si le champs <strong>Agent.s intervenant</strong> n'est pas renseignable, vous pouvez tout de même valider le formulaire.</p>

<form action="{{ route('estates.store') }}" method="POST">

    @csrf
    <label for="owner" class="form_input_label">
        Propriétaire
    </label>
    <select type="checkbox" class="form_input" name="owner" id="owner">
        <option value="default" selected>-- Veuillez sélectionner une option --</option>
        @foreach ($owners as $owner )
        <option value="{{ $owner->owner_id }}">{{ $owner->owner_surname . " " . $owner->owner_name}}</option>
        @endforeach
    </select>

    <label for="address" class="form_input_label">
        Adresse du bien
    </label>
    <input type="text" class="form_input" name="address" id="address">

    <label for="zone" class="form_input_label">
        Secteur affecté
    </label>
    <select type="text" class="form_input" name="zone" id="zone">
        <option value="default" selected>-- Veuillez sélectionner une option --</option>
        @foreach ($zones as $zone )
        <option value="{{ $zone->zone_id }}">{{ $zone->zone_name . " | " . $zone->cities->pluck('city_name')->implode(', ')}}</option>
        @endforeach
    </select>

    <label for="type" class="form_input_label">
        Type de bien
    </label>
    <select type="text" class="form_input" name="type" id="type">
        <option value="default" selected>-- Veuillez sélectionner une option --</option>
        @foreach ($types as $type )
        <option value="{{ $type->value }}">{{ $type->name }}</option>
        @endforeach
    </select>

    <label for="rooms" class="form_input_label">
        Nombre de pièces
    </label>
    <input type="text" class="form_input" name="rooms" id="rooms">

    <label for="surface" class="form_input_label">
        Surface du bien (en m²)
    </label>
    <input type="number" step="0.01" class="form_input" name="surface" id="surface">

    <label for="agents[]" class="form_input_label">
        Agent.s intervenant (plusieurs options sont possibles)
    </label>
    <select class="form_input" name="agents[]" id="agents" multiple>
        @foreach ($agents as $agent)
        <option value="{{ $agent->agent_id }}">{{ $agent->agent_name. " | " . $agent->zone->zone_name}}</option>
        @endforeach
    </select>

    <label for="services[]" class="form_input_label">
        Prestation.s
    </label>
    <select class="form_input" name="services[]" id="services" multiple>
        @foreach ($services as $service)
        <option value="{{ $service->service_id }}">{{ $service->service_name. " | " . $service->service_type}}</option>
        @endforeach
    </select>

    <button type="submit" class="form_submit">
        Ajouter le bien
    </button>

</form>
@endsection