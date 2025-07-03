@extends('layouts.admin');

@section('content')

    <section class="cities_edit">
        <div class="main_title">
            <h1>Modifier la ville — <strong>{{ $city->city_name }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('cities.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="inputs_list">
                <p class="important">Vous pouvez modifier <strong>tous les champs</strong></p>

                <form action="{{ route('cities.update.{$city->city_code}') }}" method="POST">

                    @csrf

                    @method('PATCH')
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
                        <option value="{{ $city->zone }}" selected>{{ $city->zone->zone_name }}</option>
                        @foreach ($zones as $zone )
                            <option value="{{ $zone->zone_id }}">{{ $zone->zone_name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="form_submit">
                        Modifier la ville
                    </button>

                </form>
            </div>
        </div>
    </section>

@endsection