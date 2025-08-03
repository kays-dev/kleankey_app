@extends('layouts.form')

@section('title', 'Nouvelle prestation')
@section('main_title', 'Ajouter une prestation')

@section('page_actions')
<div class="return">
    <a href="{{ route('services.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<p class="important">Si les champs <strong>Agents et Biens</strong> ne sont pas renseignables, vous pouvez tout de même valider le formulaire.</p>

<form action="{{ route('services.store') }}" method="POST">

    @csrf
    <div class="form_input_box">
        <label for="name" class="form_input_label">
            Intitulé de la prestation
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="name" id="name">
        </div>
    </div>

    <div class="form_input_box">
        <label for="type" class="form_input_label">
            Type de prestation
        </label>

        <div class="input_box">
            <select class="form_input" name="type" id="type">
                <option value="" selected>-- Veuillez sélectionner une option --</option>
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
            <input type="textarea" class="form_input" name="description" id="description">
        </div>
    </div>

    <div class="form_input_box">
        <label for="duration" class="form_input_label">
            Durée recommandée
        </label>

        <div class="input_box">
            <input type="time" class="form_input" name="duration" id="duration">
        </div>
    </div>

    <div class="form_input_box">
        <label for="agent" class="form_input_label">
            Agent assigné
        </label>

        <div class="input_box">
            <select class="form_input" name="agents" id="agents">
                <option value="" selected>-- Veuillez sélectionner une option --</option>
                @foreach ($agents as $agent)
                <option value="{{ $agent->agent_id }}">{{ $agent->agent_name. " | " . $agent->zone->zone_name}}</option>
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
                <option value="" selected>-- Veuillez sélectionner des options --</option>
                @foreach ($estates as $estate)
                <option value="{{ $estate->estate_id }}">{{ $estate->estate_code . " | " . ucfirst($estate->estate_type->value)}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="form_submit">
        Ajouter la prestation
    </button>

</form>
@endsection