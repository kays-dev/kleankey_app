<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KleanKey app')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antic&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/form.css', 'resources/js/form.js'])
    @vite(['resources/css/table.css', 'resources/js/table.js'])
    @vite(['resources/css/view.css', 'resources/js/view.js'])

</head>

<body>
    <header>
        <nav>
            <div class="menu">
                <button class="menu_toggle" id="menu_toggle"><img src="" alt="menu hamburger"></button>

                <div class="main_menu" id="main_menu">
                    <div class="main_menu_title">
                        <h3>Menu</h3>
                        <img src="" alt="bulles de séparation">
                    </div>
                    <ul>
                        @yield('menu')
                    </ul>
                    <button class="logout" id="logout">Déconnexion</button>
                </div>
            </div>
            <div class="logo_box">
                <img src="" alt="logo" class="kleankey_logo">
            </div>
            <div class="nav_actions">
                <div class="notification_bell"><img src="" alt="notifications"></div>
                <div class="profile_icon"><img src="" alt="profil"></div>
                <div class="profile_box">
                    <div class="profile_box_user">
                        <div class="profile_box_name">
                            <p>{{-- $user->user_surname --}} {{-- str_pad($user->user_name, 1,'.', STR_PAD_RIGHT )
                                        --}}</p>
                        </div>
                        <img src="" alt="option de profil" class="profile_toggle" id="profile_toggle">
                    </div>
                    <ul class="profile_options" id="profile_options">
                        <li class="profile_option"><a href="">Profil KleanKey</a></li>
                        <li class="profile_option"><a href="">Sécurité du compte</a></li>
                        <li class="profile_option"><a href="">Confidentialité</a></li>
                        <li class="profile_option"><a href="">Déconnexion</a></li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main>
        <div class="main_title">
            <h1>@yield('main_title', 'Tableau de bord')</h1>
        </div>

        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <section>
            <div class="page_main_actions">
                @yield('page_actions')
            </div>

            @yield('content')
        </section>
    </main>

    <footer>
        <div>
            <p class="footer_sentence">Service proprosé par</p>
        </div>
        <img src="" alt="" class="kleanetklair_logo">
    </footer>

</body>

</html>