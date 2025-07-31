@php
    $layout = 'layouts.admin_menu';
@endphp

@extends($layout)

@section('content')

<div class="table_actions">
    @yield('pages')
    <div class="sort">
        <p>Trier</p>
        <img src="" alt="options du tri" class="table_actions_dropdown_icon">
    </div>
    <div class="filter">
        <p>Filtrer</p>
        <img src="" alt="options du filtre" class="table_actions_dropdown_icon">
    </div>
    <div class="search">
        <form action="" method="GET" class="search_bar">

            @csrf

            <input type="text" placeholder="Recherche">

            <button class="search_button"><img src="" alt="rechercher la saisie"
                    class="search_button_icon"></button>
        </form>
    </div>
</div>

<div class="table">
    <table>
        <thead>
            <tr class="table_header">
                @yield('table_headers')
            </tr>
        </thead>
        <tbody>
            @yield('table_rows')
        </tbody>
    </table>
</div>

@endsection