@extends('layouts.admin');

@section('content')

    <section class="zones_list">
        <div class="main_title">
            <h1>Secteurs</h1>
        </div>

        <div class="datas_list">
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{-- route('homepage') --}}" class="return_to_dashboard">Retour au tableau de bord</a>
                </div>
                <div class="add_data">
                    <div>
                        <a href="{{ route('zones.create') }}"><img src="" alt="ajouter un secteur" class="page_actions_button"></a>
                    </div>
                </div>
                <div class="show_other_datas">
                    <div>
                        <a href="{{ route('cities.index') }}"><img src="" alt="consulter les villes" class="page_actions_button"></a>
                    </div>
                </div>
            </div>

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
                    <form action="" method="" class="barre de recherche">

                        @csrf

                        <input type="text" placeholder="Recherche">

                        <button class="search_button"><img src="" alt="bouton rechercher la saisie"
                                class="search_button_icon"></button>
                    </form>
                </div>
            </div>

            <div class="table">
                <table>
                    <tr class="table_header">
                        <th class="table_title">Nom</th>
                        <th class="table_title">Villes</th>
                        <th class="table_title">Régions</th>
                    </tr>
                    @foreach ($zones as $zone)
                        <tr class="table_content">
                            <td class="table_data">{{ $zone->zone_name}}</td>
                            <td class="table_data">
                                    {{ $zone->cities->pluck('city_name')->implode(', ') }}
                            </td>
                            <td class="table_data">
                                    {{ $zone->cities->pluck('region')->unique()->implode(', ') }}
                            </td>
                            <td class="data_actions">
                                <div class="data_button">
                                    <a href="
                                                    ">
                                        <img src="" alt="">
                                    </a>
                                </div>
                                <div class="data_button">
                                    <a href="">
                                        <img src="" alt="">
                                    </a>
                                </div>
                                <div class="data_button">
                                    <a href="">
                                        <img src="" alt="">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>

@endsection