@extends('layouts.form')

@section('title', 'Nouveau secteur')
@section('main_title', 'Ajouter un secteur')

@section('page_actions')
<div class="return">
    <a href="{{ route('zones.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
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
@endsection