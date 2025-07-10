@extends('layouts.form')

@section('title', 'Nouvel agent')
@section('main_title', 'Ajouter un agent')

@section('page_actions')
<div class="return">
    <a href="{{ route('agents.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<form action="{{ route('agents.store') }}" method="POST">

    @csrf
    <label for="lname" class="form_input_label">
        Nom
    </label>
    <input type="text" class="form_input" name="lname" id="lname">

    <label for="fname" class="form_input_label">
        Prénom
    </label>
    <input type="text" class="form_input" name="fname" id="fname">

    <label for="address" class="form_input_label">
        Adresse
    </label>
    <input type="text" class="form_input" name="address" id="address">

    <label for="email" class="form_input_label">
        Adresse mail
    </label>
    <input type="text" class="form_input" name="email" id="email">

    <label for="phone" class="form_input_label">
        Numéro de téléphone
    </label>
    <input type="text" class="form_input" name="phone" id="phone">

    <label for="zone" class="form_input_label">
        Secteur d'intervention
    </label>
    <select type="text" class="form_input" name="zone" id="zone">
        <option value="default" selected>-- Veuillez sélectionner une option --</option>
        @foreach ($zones as $zone )
        <option value="{{ $zone->zone_id }}">{{ $zone->zone_name . " | " . $zone-> cities}}</option>
        @endforeach
    </select>

    <button type="submit" class="form_submit">
        Ajouter le prestataire
    </button>

</form>
@endsection