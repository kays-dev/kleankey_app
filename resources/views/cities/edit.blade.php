@extends('layouts.form')

@section('title', 'Modification de ' . $city->city_name)
@section('main_title', 'Modifier la ville — ' . $city->city_name)

@section('page_actions')
<div class="return">
    <a href="{{ route('cities.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<p class="important">Vous pouvez modifier <strong>tous les champs</strong></p>

<form action="{{ route('cities.update',$city->city_code) }}" method="POST">

    @csrf

    @method('PATCH')
    <div class="form_input_box">
        <label for="name" class="form_input_label">
            Nom de la ville
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="name" id="name" value="{{ $city->city_name }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="postcode" class="form_input_label">
            Code postal
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="postcode" id="postcode" value="{{ $city->postcode }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="region" class="form_input_label">
            Région
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="region" id="region" value="{{ $city->region }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="zone" class="form_input_label">
            Secteur lié
        </label>

        <div class="input_box">
            <select type="text" class="form_input" name="zone" id="zone">
                <option value="{{ $city->zone ?? '' }}" selected>{{ $city->zone?->zone_name ?? '--' }}</option>
                @foreach ($zones as $zone )
                <option value="{{ $zone->zone_id }}">{{ $zone->zone_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="form_submit">
        Modifier la ville
    </button>

</form>
@endsection