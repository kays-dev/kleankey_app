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
    <div class="form_input_box">
        <label for="lname" class="form_input_label">
            Nom
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="lname" id="lname">
        </div>
    </div>

    <div class="form_input_box">
        <label for="fname" class="form_input_label">
            Prénom
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="fname" id="fname">
        </div>
    </div>

    <div class="form_input_box">
        <label for="address" class="form_input_label">
            Adresse
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="address" id="address">
        </div>
    </div>

    <div class="form_input_box">
        <label for="email" class="form_input_label">
            Adresse mail
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="email" id="email">
        </div>
    </div>

    <div class="form_input_box">
        <label for="phone" class="form_input_label">
            Numéro de téléphone
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="phone" id="phone">
        </div>
    </div>

    <div class="form_input_box">
        <label for="zone" class="form_input_label">
            Secteur d'intervention
        </label>

        <div class="input_box">
            <select type="text" class="form_input" name="zone" id="zone">
                <option value="default" selected>-- Veuillez sélectionner une option --</option>
                @foreach ($zones as $zone )
                <option value="{{ $zone->zone_id }}">{{ $zone->zone_name . " | " . $zone->cities->pluck('city_name')->implode(', ')}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="form_submit">
        Ajouter le prestataire
    </button>

</form>
@endsection