<!-- @extends('layouts.admin');

@section('content') -->

    <section class="agents_edit">
        <div class="main_title">
            <h1>Modifier l'agent' — <strong>{{ $agent->surname . ' ' . $agent->name  }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('agents.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="inputs_list">
                <p class="important">Vous ne pouvez modifier que les champs suivants : <strong> Adresse, Adresse mail,
                        Numéro de téléphone</strong></p>

                <form action="{{ route('agents.update.{$agent->owner_id}') }}" method="POST">

                    @csrf

                    @method('PATCH')
                    <label for="lname" class="form_input_label">
                        Nom
                    </label>
                    <input type="text" class="form_input" name="lname" id="lname" value="{{ $agent->owner_name }}">

                    <label for="fname" class="form_input_label">
                        Prénom
                    </label>
                    <input type="text" class="form_input" name="fname" id="fname" value="{{ $agent->owner_surname }}">

                    <label for="address" class="form_input_label">
                        Adresse
                    </label>
                    <input type="text" class="form_input" name="address" id="address" value="{{ $agent->owner_address }}">

                    <label for="email" class="form_input_label">
                        Adresse mail
                    </label>
                    <input type="text" class="form_input" name="email" id="email" value="{{ $agent->owner_mail }}">

                    <label for="phone" class="form_input_label">
                        Numéro de téléphone
                    </label>
                    <input type="text" class="form_input" name="phone" id="phone" value="{{ $agent->owner_tel }}">

                    <label for="zone" class="form_input_label">
                        Secteur d'intervention
                    </label>
                    <select type="text" class="form_input" name="zone" id="zone">
                        <option value="{{ $agent->zone }}" selected>{{ $agent->zone->zone_name . " | " . $agent->zone->cities }}</option>
                        @foreach ($zones as $zone )
                            <option value="{{ $zone->zone_id }}">{{ $zone->zone_name . " | " . $zone->cities}}</option>
                        @endforeach
                    </select>

                    <h3 class="form_input_label">
                        Liste des biens :
                    </h3>
                    <table class="owner_estate_list">
                        <tr>
                            <th>Code bien</th>
                            <th>Type</th>
                            <th>Nombre de pièces</th>
                            <th>Adresse</th>
                            <th>Prestation</th>
                        </tr>
                        @foreach ($estates as $estate)
                            <tr>
                                <td>{{ $estate->estate_code }}</td>
                                <td>{{ $estate->estate_type }}</td>
                                <td>{{ $estate->room_number }}</td>
                                <td>{{ $estate->estate_address }}</td>
                                <td>{{ $estate->services }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <button type="submit" class="form_submit">
                        Modifier le prestataire
                    </button>

                </form>
            </div>
        </div>
    </section>

<!-- @endsection -->