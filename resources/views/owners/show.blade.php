@extends('layouts.admin');

@section('content')

    <section class="owners_show">
        <div class="main_title">
            <h1>Consulter le propriétaire — <strong>{{ $owner->surname . ' ' . $owner->name  }}</strong></h1>
        </div>

        <div>
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{ route('owners.index') }}" class="return_to_list">Retour à la liste</a>
                </div>
            </div>

            <div class="owner_details">

                <h3 class="details_title">
                    Nom complet
                </h3>
                <p class="details">{{ $owner->owner_name . ' ' . $owner->owner_surname }}</p>

                <h3 class="details_title">
                    Adresse
                </h3>
                <p class="details">
                    {{ $owner->owner_address }}
                </p>

                <h3 class="details_title">
                    Adresse mail
                </h3>
                <p class="details">
                    {{ $owner->owner_mail }}
                </p>

                <h3 class="details_title">
                    Numéro de téléphone
                </h3>
                <p class="details">
                    {{ $owner->owner_tel }}
                </p>

                <h3 class="details_title">
                    Liste des biens :
                </h3>
                <table class="owner_estate_list">
                    <tr>
                        <th>Code bien</th>
                        <th>Type</th>
                        <th>Nombre de pièces</th>
                        <th>Adresse</th>
                    </tr>
                    @foreach ($estates as $estate)
                        <tr>
                            <td>{{ $estate->estate_code }}</td>
                            <td>{{ $estate->estate_type }}</td>
                            <td>{{ $estate->room_number }}</td>
                            <td>{{ $estate->estate_address }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </section>

@endsection