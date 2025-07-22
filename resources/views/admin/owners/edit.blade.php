@extends('layouts.form')

@section('title', 'Modification de ' . $owner->owner_surname . ' ' . $owner->owner_name)
@section('main_title', 'Modifier le propriétaire — ' . $owner->owner_surname . ' ' . $owner->owner_name)

@section('page_actions')
<div class="return">
    <a href="{{ route('owners.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<p class="important">Vous ne pouvez modifier que les champs suivants : <strong> Adresse, Adresse mail,
        Numéro de téléphone</strong></p>

<form action="{{ route('owners.update', $owner->owner_id) }}" method="POST">

    @csrf

    @method('PATCH')
    <div class="form_input_box">
        <label for="lname" class="form_input_label">
            Nom
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="lname" id="lname" value="{{ $owner->owner_name }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="fname" class="form_input_label">
            Prénom
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="fname" id="fname" value="{{ $owner->owner_surname }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="address" class="form_input_label">
            Adresse
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="address" id="address" value="{{ $owner->owner_address }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="email" class="form_input_label">
            Adresse mail
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="email" id="email" value="{{ $owner->owner_mail }}">
        </div>
    </div>

    <div class="form_input_box">
        <label for="phone" class="form_input_label">
            Numéro de téléphone
        </label>

        <div class="input_box">
            <input type="text" class="form_input" name="phone" id="phone" value="{{ $owner->owner_tel }}">
        </div>
    </div>

    <button type="submit" class="form_submit">
        Modifier le client
    </button>

</form>
@endsection