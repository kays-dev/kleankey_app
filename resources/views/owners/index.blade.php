@extends('layouts.admin');

@session('content')

        <section class="owners_list">
            <div>
                <h1>Propriétaires</h1>
            </div>

            <div class="datas_list">
                <div class="page_main_actions">
                    <div class="return">
                        <a href="#" class="return_to_dashboard">Retour au tableau de bord</a>
                    </div>
                    <div class="add_data">
                        <div>
                            <img src="" alt="ajouter un client" class="page_actions_button">
                        </div>
                    </div>
                </div>
                <div class="table_actions">
                    <div class="pages">
                        <div>
                            <img src="" alt="page précédente" class="table_actions_icon">
                        </div>
                        <div>
                            <div>
                                <p>current page / total pages</p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <img src="" alt="page suivante" class="table_actions_icon">
                            </div>
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

                            @crsf
                            
                            <input type="text" placeholder="Recherche">

                            <button class="search_button"><img src="" alt="bouton rechercher la saisie" class="search_button_icon"></button>
                        </form>
                    </div>
                </div>
                <div class="table">
                    <table>
                        <tr class="table_header">
                            <th class="table_title">Prénom</th>
                            <th class="table_title">Nom</th>
                            <th class="table_title">Adresse</th>
                            <th class="table_title">Email</th>
                            <th class="table_title">Téléphone</th>
                        </tr>
                        <tr class="table_content">
                            @foreach ($owners as $owner)
                                <td class="table_data_first">{{ $owner->surname_owner}}</td>
                                <td class="table_data">{{ $owner->name_owner}}</td>
                                <td class="table_data">{{ $owner->address_owner}}</td>
                                <td class="table_data">{{ $owner->mail_owner}}</td>
                                <td class="table_data">{{ $owner->tel_owner}}</td>
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
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </section>

@endsession