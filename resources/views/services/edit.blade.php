@extends('layouts.form')

@section('title', 'Modification de ' . $service->service_name)
@section('main_title', 'Modifier la prestation — ' . $service->service_name)

@section('page_actions')
<div class="return">
    <a href="{{ route('services.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<p class="important">Vous pouvez modifier tous les champs <strong>tous les champs</strong>.</p>

<form action="{{ route('services.update', $service->service_id) }}" method="POST">

    @csrf

    @method('PATCH')
    <div class="form_input_box">
        <label for="name" class="form_input_label">
            Intitulé de la prestation
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="name" id="name" value="{{ $service->service_name }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="type" class="form_input_label">
            Type de prestation
        </label>

        <div class="input_box">
            <select class="form_input" name="type" id="type">
                <option value="{{ $service->service_type }}" selected>{{ ucfirst($service->service_type) }}</option>
                @foreach ($types as $type )
                <option value="{{ $type->value }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form_input_box">
        <label for="description" class="form_input_label">
            Description de la prestation
        </label>

        <div class="input_box">
            <input type="textarea" class="form_input" name="description" id="description" value="{{ $service->description }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="duration" class="form_input_label">
            Durée recommandée
        </label>

        <div class="input_box">
            <input type="time" class="form_input" name="duration" id="duration" value="{{ $service->duration }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="agent" class="form_input_label">
            Agent assigné
        </label>

        <div class="input_box">
            <select class="form_input" name="agents" id="agents">
                <option value="{{ $service->agent_id }}" selected>{{ $service->agent->agent_surname . " | " . $agent->agent->zone->zone_name }}</option>
                @foreach ($agents as $agent)
                <option value="{{ $agent->agent_id }}">{{ $agent->agent_name . " | " . $agent->zone->zone_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form_input_box">
        <label for="estates[]" class="form_input_label">
            Bien.s concerné.s
        </label>

        <div class="input_box">
            <select class="form_input" name="estates[]" id="estates" multiple>
                @foreach ($estates as $estate)
                <option value="{{ $estate->estate_id }}" @selected(in_array($estate->estate_id, $service->estates->pluck('estate_id')->toArray()))>{{ $estate->estate_code . " | " . $estate->estate_type}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="form_submit">
        Modifier la prestation
    </button>

</form>
@endsection