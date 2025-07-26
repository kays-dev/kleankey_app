@php
    $layout = $user->role->value === 'agent' || $user->role->value === 'owner'
        ? 'layouts.user_menu'
        : 'layouts.admin_menu';
@endphp

@extends($layout)

@section('content')

<div class="table_actions">
    <div class="pages">
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
        <div class="page_number">
            <p>{{$pagination->currentPage() . "  /  " . $pagination->lastPage() }}</p>
        </div>
        @if ($pagination->hasMorePages())
        @if ($pagination->onLastPage())
        <div class="no_next">
            <img src="" alt="page suivante" class="table_actions_icon">
        </div>
        @else
        <div class="next_page">
            <a href="{{ $pagination->nextPageUrl() }}">
                <img src="" alt="page suivante" class="table_actions_icon">
            </a>
        </div>
        @endif
        @endif
    </div>
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