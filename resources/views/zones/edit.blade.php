@extends('layouts.admin');

@section('content')

    <section class="zones_edit">
        <div class="main_title">
            <h1>Modifier le secteur — <strong>{{ $zone->zone_name }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('zones.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="inputs_list">
                <p class="important">Vous pouvez modifier <strong>tous les champs</strong></p>

                <form action="{{ route('zones.update.{$zone->zone_id}') }}" method="POST">

                    @csrf

                    @method('PATCH')
                    <label for="name" class="form_input_label">
                        Nom du secteur
                    </label>
                    <input type="text" class="form_input" name="name" id="name">

                    <button type="submit" class="form_submit">
                        Modifier le secteur
                    </button>

                </form>
            </div>
        </div>
    </section>

@endsection