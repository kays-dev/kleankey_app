@extends('layouts.admin');

@section('content')

    <section class="estates_edit">
        <div class="main_title">
            <h1>Modifier le bien — <strong>{{ $estate->estate_code }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('estates.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="inputs_list">
                <p class="important">Vous pouvez modifier <strong>tous les champs</strong></p>

                <form action="{{ route('estates.update.{$estate->estate_code}') }}" method="POST">

                    @csrf

                    @method('PATCH')
                    <label for="owner" class="form_input_label">
                        Propriétaire
                    </label>
                    <select class="form_input" name="owner" id="owner">
                        <option value="{{ $estate->owner_id }}" selected>{{ $estate->owner->owner_surname . ' ' . $estate->owner->owner_name }}</option>
                        @foreach ($owners as $owner )
                            <option value="{{ $owner->owner_id }}">{{ $owner->owner_surname . " " . $owner->owner_name}}</option>
                        @endforeach
                    </select>                    

                    <label for="address" class="form_input_label">
                        Adresse du bien
                    </label>
                    <input type="text" class="form_input" name="address" id="address" value="{{ $estate->estate_address }}">

                    <label for="zone" class="form_input_label">
                        Secteur affecté
                    </label>
                    <select class="form_input" name="zone" id="zone">
                        <option value="{{ $estate->zone_id }}" selected>{{ $estate->zone->zone_name }}</option>
                        @foreach ($zones as $zone )
                            <option value="{{ $zone->zone_id }}">{{ $zone->zone_name . " | " . $zone-> cities}}</option>
                        @endforeach
                    </select>

                    <label for="type" class="form_input_label">
                        Type de bien
                    </label>
                    <select class="form_input" name="type" id="type">
                        <option value="{{ $estate->estate_type }}" selected>{{ ucfirst($estate->estate_type)}}</option>
                        @foreach ($types as $type )
                            <option value="{{ $type->value }}">{{ $type->name }}</option>
                        @endforeach
                    </select>

                    <label for="rooms" class="form_input_label">
                        Nombre de pièces
                    </label>
                    <input type="text" class="form_input" name="rooms" id="rooms" value="{{ $estate->rooms_number }}">

                    <label for="surface" class="form_input_label">
                        Surface du bien (en m²)
                    </label>
                    <input type="number" step="0.01" class="form_input" name="surface" id="surface" value="{{ $estate->surface }}">

                    <label for="agents" class="form_input_label">
                        Agent.s intervenant (plusieurs options sont possibles)
                    </label>
                    <select class="form_input" name="agents[]" id="agents" multiple>   
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->agent_id }}" @selected(in_array($agent->agent_id, $estate->agents->pluck('agent_id')->toArray()))>
                            {{ $agent->agent_name . " | " . $agent->zone }}
                            </option>
                        @endforeach
                    </select>

                    <label for="services[]" class="form_input_label">
                        Prestation.s
                    </label>
                    <select class="form_input" name="services[]" id="services" multiple>   
                        @foreach ($services as $service)
                            <option value="{{ $service->service_id }}" @selected(in_array($service->service_id, $estate->services->pluck('service_id')->toArray()))>{{ $service->service_name. " | " . $service->service_type}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="form_submit">
                        Modifier le bien
                    </button>

                </form>
            </div>
        </div>
    </section>

@endsection