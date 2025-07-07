@extends('layouts.admin');

@section('content')


    <section class="services_create">
        <div class="main_title">
            <h1>Ajouter une prestation</h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('services.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="inputs_list">
                <p class="important">Veuillez remplir tous les champs. Si les champs <strong>Agents et Biens</strong> ne sont pas renseignable, vous pouvez tout de même valider le formulaire.</p>

                <form action="{{ route('services.store') }}" method="POST">

                    @csrf
                    <label for="name" class="form_input_label">
                        Intitulé de la prestation
                    </label>
                    <input type="text" class="form_input" name="name" id="name">

                    <label for="type" class="form_input_label">
                        Type de prestation
                    </label>
                    <select class="form_input" name="type" id="type">
                        <option value="default" selected>-- Veuillez sélectionner une option --</option>
                        @foreach ($types as $type )
                            <option value="{{ $type->value }}">{{ $type->name }}</option>
                        @endforeach
                    </select>

                    <label for="description" class="form_input_label">
                        Description de la prestation
                    </label>
                    <input type="textarea" class="form_input" name="description" id="description">

                    <label for="duration" class="form_input_label">
                        Durée recommandée
                    </label>
                    <input type="time" class="form_input" name="duration" id="duration">

                    <label for="agent" class="form_input_label">
                        Agent assigné
                    </label>
                    <select class="form_input" name="agents" id="agents">
                        <option value="none" selected>-- Veuillez sélectionner une option --</option>   
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->agent_id }}">{{ $agent->agent_name. " | " . $agent->zone->zone_name}}</option>
                        @endforeach
                    </select>

                    <label for="estates[]" class="form_input_label">
                        Bien.s concerné.s
                    </label>
                    <select class="form_input" name="estates[]" id="estates" multiple>   
                        @foreach ($estates as $estate)
                            <option value="{{ $estate->estate_id }}">{{ $estate->estate_code . " | " . $estate->estate_type}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="form_submit">
                        Ajouter la prestation
                    </button>

                </form>
            </div>
        </div>
    </section>

@endsection