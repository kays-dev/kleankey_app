@extends('layouts.form')

@section('title', 'Modification de {{ $owner->surname . ' ' . $owner->name  }}')
@section('main_title', 'Modifier le propriétaire — <strong>{{ $owner->surname . ' ' . $owner->name  }}</strong>')

@section('page_actions')
<div class="return">
    <a href="{{ route('owners.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<p class="important">Vous ne pouvez modifier que les champs suivants : <strong> Adresse, Adresse mail,
        Numéro de téléphone</strong></p>

<form action="{{ route('owners.update', $owner->owner_id') }}" method="POST">

    @csrf

    @method('PATCH')
    <label for="lname" class="form_input_label">
        Nom
    </label>
    <input type="text" class="form_input" name="lname" id="lname" value="{{ $owner->owner_name }}">

    <label for="fname" class="form_input_label">
        Prénom
    </label>
    <input type="text" class="form_input" name="fname" id="fname" value="{{ $owner->owner_surname }}">

    <label for="address" class="form_input_label">
        Adresse
    </label>
    <input type="text" class="form_input" name="address" id="address" value="{{ $owner->owner_address }}">

    <label for="email" class="form_input_label">
        Adresse mail
    </label>
    <input type="text" class="form_input" name="email" id="email" value="{{ $owner->owner_mail }}">

    <label for="phone" class="form_input_label">
        Numéro de téléphone
    </label>
    <input type="text" class="form_input" name="phone" id="phone" value="{{ $owner->owner_tel }}">

    <h3 class="form_input_label">
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

    <button type="submit" class="form_submit">
        Modifier le client
    </button>

</form>
@endsection