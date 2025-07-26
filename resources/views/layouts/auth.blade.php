<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KleanKey app')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antic&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    @vite(['resources/css/auth.css', 'resources/js/auth.js'])
</head>

<body>
    <header>
        <nav>
            <div class="logo_box">
                <img src="" alt="logo" class="kleankey_logo">
            </div>
            <div class="nav_actions">
                <div class="nav_arrow">
                    <img src="" alt="icône flèche droite">
                </div>
                <div class="nav_connect">
                    <a href="{{ route('user.login') }}">Se connecter</a>
                </div>
                <div class="nav_arrow">
                    <img src="" alt="icône flèche gauche">
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
            @yield('content')
        </section>
    </main>

    <footer>
        <div>
            <p class="footer_sentence">Service proprosé par</p>
        </div>
        <img src="" alt="logo de klean&klair" class="kleanetklair_logo">
    </footer>

</body>

</html>