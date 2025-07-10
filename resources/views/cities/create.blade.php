@extends('layouts.form')

@section('title', 'Nouvelle ville')
@section('main_title', 'Ajouter une ville')

@section('page_actions')
<div class="return">
    <a href="{{ route('cities.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<form action="{{ route('cities.store') }}" method="POST">

    @csrf
    <label for="name" class="form_input_label">
        Nom de la ville
    </label>
    <input type="text" class="form_input" name="name" id="name">

    <label for="postcode" class="form_input_label">
        Code postal
    </label>
    <input type="text" class="form_input" name="postcode" id="postcode">

    <label for="region" class="form_input_label">
        Région
    </label>
    <input type="text" class="form_input" name="region" id="region">

    <label for="zone" class="form_input_label">
        Secteur lié
    </label>
    <select type="text" class="form_input" name="zone" id="zone">
        <option value="default" selected>-- Veuillez sélectionner une option --</option>
        @foreach ($zones as $zone )
        <option value="{{ $zone->zone_id }}">{{ $zone->zone_name }}</option>
        @endforeach
    </select>

    <button type="submit" class="form_submit">
        Ajouter la ville
    </button>

</form>
@endsection