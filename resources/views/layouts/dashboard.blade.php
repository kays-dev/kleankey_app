<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KleanKey app')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antic&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])
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
                    @if(Auth::guard('admin'))
                    <form action="{{ route('admin.logout')}}" class="menu_logout">
                        <button class="logout" id="logout">Déconnexion</button>
                    </form>
                    @else
                    <form action="{{ route('user.logout')}}" class="menu_logout">
                        <button class="logout" id="logout">Déconnexion</button>
                    </form>
                    @endif
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
                            <p>@if(Auth::guard('admin'))
                                {{ $admin->admin_surname }} {{ substr($admin->admin_name, 0, 1)
                                        }}
                                @else
                                {{ $user->user_surname }} {{ substr($user->user_name, 0, 1)
                                        }}
                                @endif
                            </p>
                        </div>
                        <img src="" alt="option de profil" class="profile_toggle" id="profile_toggle">
                    </div>
                    <ul class="profile_options" id="profile_options">
                        <li class="profile_option"><a href="">Profil KleanKey</a></li>
                        <li class="profile_option"><a href="">Sécurité du compte</a></li>
                        <li class="profile_option"><a href="">Confidentialité</a></li>
                        @if(Auth::guard('admin'))
                        <li class="profile_option"><a href="{{ route('admin.logout')}}">Déconnexion</a></li>
                        @else
                        <li class="profile_option"><a href="{{ route('user.logout')}}">Déconnexion</a></li>
                        @endif

                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main>
        <div class="main_title">
            <h1>@yield('main_title', 'Bienvenue sur KleanKey !')</h1>
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
            <div class="box">
                @yield('first-box')
            </div>
            <div class="box">
                @yield('second-box')
            </div>
            <div class="section">
                @yield('coming-soon')
            </div>

            <div class="pie_chart">
                @yield('pie-chart')
            </div>

            <div class="bar_chart">
                @yield('bar-chart')
            </div>
        </section>
    </main>

    <footer>
        <div>
            <p class="footer_sentence">Service proprosé par</p>
        </div>
        <img src="" alt="logo de klean&klair" class="kleanetklair_logo">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>