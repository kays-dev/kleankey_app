@extends('layouts.admin')

@section('content')

<div class="table_actions">
    <div class="pages">
        <div>
            @if ($pagination->hasPages())
            @if ($pagination->onFirstPage())
            <div class="no_previous">
                <img src="" alt="page précédente" class="table_actions_icon">
            </div>
            @else
            <div class="previous_page">
                <a href="{{ $pagination->previousPageUrl() }}">
                    <img src="" alt="page précédente" class="table_actions_icon">
                </a>
            </div>
            @endif
            @endif
        </div>
        <div>
            <div>
                <p>{{$pagination->currentPage() . "  /  " . $pagination->lastPage() }}</p>
            </div>
        </div>
        <div>
            @if ($pagination->hasMorePages())
            <div class="next_page">
                <a href="{{ $pagination->nextPageUrl() }}">
                    <img src="" alt="page suivante" class="table_actions_icon">
                </a>
            </div>
            @else
            <div class="no_next">
                <img src="" alt="page suivante" class="table_actions_icon">
            </div>
            @endif
        </div>
    </div>
    <div class="sort">
        <p>Trier</p>
        <img src="" alt="flèche déroulante tri" class="table_actions_dropdown_icon">
    </div>
    <div class="filter">
        <p>Filtrer</p>
        <img src="" alt="flèche déroulante filtrage" class="table_actions_dropdown_icon">
    </div>
    <div class="search">
        <form action="" method="GET" class="search_bar">

            @csrf

            <input type="text" placeholder="Recherche">

            <button class="search_button"><img src="" alt="bouton rechercher la saisie"
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