@extends('layouts.form')

@section('title', 'Modification de {{ $zone->zone_name }}')
@section('main_title', 'Modifier le secteur — <strong>{{ $zone->zone_name }}</strong>')

@section('page_actions')
<p class="important">Vous pouvez modifier <strong>tous les champs</strong></p>

<form action="{{ route('zones.update',$zone->zone_id') }}" method="POST">

    @csrf

    @method('PATCH')
    <label for="name" class="form_input_label">
        Nom du secteur
    </label>
    <input type="text" class="form_input" name="name" id="name">

    <button type="submit" class="form_submit">
        Modifier le secteur
    </button>

</form>
@endsection