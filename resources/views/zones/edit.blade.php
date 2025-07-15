@extends('layouts.form')

@section('title', 'Modification de ' . $zone->zone_name)
@section('main_title', 'Modifier le secteur — ' . $zone->zone_name)

@section('page_actions')
<div class="return">
    <a href="{{ route('zones.index') }}" class="return_to_list">Retour à la liste</a>
</div>
@endsection

@section('form')
<p class="important">Vous pouvez modifier <strong>tous les champs</strong>.</p>

<form action="{{ route('zones.update',$zone->zone_id) }}" method="POST">

    @csrf

    @method('PATCH')
    <div class="form_input_box">
        <label for="name" class="form_input_label">
            Nom du secteur :
        </label>
        
        <div class="input_box">
            <input type="text" class="form_input" name="name" id="name" value="{{$zone->zone_name}}">
        </div>
    </div>

    <button type="submit" class="form_submit">
        Modifier le secteur
    </button>

</form>
@endsection