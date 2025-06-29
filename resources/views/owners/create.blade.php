@extends('layouts.admin');

@section('content')

    <section class="owners_create">
        <div class="main_title">
            <h1>Ajouter un propriétaire</h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('owners.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="inputs_list">
                <p class="important">Veuillez remplir tous les champs</p>

                <form action="{{ route('owners.store') }}" method="POST">

                    @csrf
                    <label for="lname" class="form_input_label">
                        Nom
                    </label>
                    <input type="text" class="form_input" name="lname" id="lname">

                    <label for="fname" class="form_input_label">
                        Prénom
                    </label>
                    <input type="text" class="form_input" name="fname" id="fname">

                    <label for="address" class="form_input_label">
                        Adresse
                    </label>
                    <input type="text" class="form_input" name="address" id="address">

                    <label for="email" class="form_input_label">
                        Adresse mail
                    </label>
                    <input type="text" class="form_input" name="email" id="email">

                    <label for="phone" class="form_input_label">
                        Numéro de téléphone
                    </label>
                    <input type="text" class="form_input" name="phone" id="phone">

                    <button type="submit" class="form_submit">
                        Ajouter le client
                    </button>

                </form>
            </div>
        </div>
    </section>

@endsection