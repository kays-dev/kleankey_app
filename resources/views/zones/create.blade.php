@extends('layouts.admin');

@section('content')


    <section class="zones_create">
        <div class="main_title">
            <h1>Ajouter un secteur d'intervention</h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('zones.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="inputs_list">
                <p class="important">Veuillez remplir tous les champs</p>

                <form action="{{ route('zones.store') }}" method="POST">

                    @csrf
                    <label for="name" class="form_input_label">
                        Nom du secteur
                    </label>
                    <input type="text" class="form_input" name="name" id="name">

                    <button type="submit" class="form_submit">
                        Ajouter le secteur
                    </button>

                </form>
            </div>
        </div>
    </section>

@endsection