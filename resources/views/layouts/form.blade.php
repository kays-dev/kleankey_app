@extends('layouts.admin_menu')

@section('content')

<div class="inputs_list">
    <p class="important">Veuillez remplir tous les champs.</p>
    @yield('form')
</div>

@endsection