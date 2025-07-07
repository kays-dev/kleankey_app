@extends('layouts.admin');

@section('content')

    <section class="services_list">
        <div class="main_title">
            <h1>Prestations</h1>
        </div>

        <div class="datas_list">
            <div class="page_main_actions">
                <div class="return">
                    <a href="{{-- route('homepage') --}}" class="return_to_dashboard">Retour au tableau de bord</a>
                </div>
                <div class="add_data">
                    <div>
                        <a href="{{ route('services.create') }}"><img src="" alt="ajouter une prestation" class="page_actions_button"></a>
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
                        <th class="table_title">Intitulé</th>
                        <th class="table_title">Type</th>
                        <th class="table_title">Durée</th>
                    </tr>
                    @foreach ($services as $service)
                        <tr class="table_content">
                            <td class="table_data_first">{{ $service->service_name }}</td>

                            <td class="table_data">{{ ucfirst($service->service_type)}}</td>

                            <td class="table_data_first">{{ $service->duration }}</td>
                            
                            <td class="data_actions">
                                <div class="data_button">
                                    <a href="
                                                    ">
                                        <img src="" alt="consulter">
                                    </a>
                                </div>
                                <div class="data_button">
                                    <a href="">
                                        <img src="" alt="modifier">
                                    </a>
                                </div>
                                <div class="data_button">
                                    <a href="">
                                        <img src="" alt="supprimer">
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