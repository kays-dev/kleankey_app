@extends('layouts.form')

@section('title', 'Modification de ' . $agent->surname . ' ' . $agent->name)
@section('main_title', 'Modifier l'agent — ' .$agent->surname . ' ' . $agent->name)

@section('page_actions')
<div class="return">
    <a href="{{ route('agents.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<p class="important">Vous ne pouvez modifier que les champs suivants : <strong> Adresse, Adresse mail,
        Numéro de téléphone et Zone</strong></p>

<form action="{{ route('agents.update',$agent->agent_id) }}" method="POST">

    @csrf

    @method('PATCH')
    <div class="form_input_box">
        <label for="lname" class="form_input_label">
            Nom
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="lname" id="lname" value="{{ $agent->owner_name }}" readonly>
        </div>
    </div>

    <div class="form_input_box">
        <label for="fname" class="form_input_label">
            Prénom
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="fname" id="fname" value="{{ $agent->owner_surname }}" readonly>
        </div>
    </div>

    <div class="form_input_box">
        <label for="address" class="form_input_label">
            Adresse
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="address" id="address" value="{{ $agent->owner_address }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="email" class="form_input_label">
            Adresse mail
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="email" id="email" value="{{ $agent->owner_mail }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="phone" class="form_input_label">
            Numéro de téléphone
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="phone" id="phone" value="{{ $agent->owner_tel }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="zone" class="form_input_label">
            Secteur d'intervention
        </label>

        <div class="input_box">
            <select type="text" class="form_input" name="zone" id="zone">
                <option value="{{ $agent->zone ?? '' }}" selected>{{ $agent->zone?->zone_name ?? '-' . " | " . $agent->zone?->cities ?? '-' }}</option>
                @foreach ($zones as $zone )
                <option value="{{ $zone->zone_id }}">{{ $zone->zone_name . " | " . $zone->cities->pluck()->('city_name')->implode(', ')}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="form_submit">
        Modifier le prestataire
    </button>

</form>
@endsection