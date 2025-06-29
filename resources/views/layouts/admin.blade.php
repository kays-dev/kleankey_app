<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propriétaires</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="main_menu">
                <ul>
                    <li><a href="" class="main_menu_links"></a></li>
                    <li><a href="" class="main_menu_links"></a></li>
                    <li><a href="" class="main_menu_links"></a></li>
                    <li><a href="" class="main_menu_links"></a></li>
                    <li><a href="" class="main_menu_links"></a></li>
                    <li><a href="" class="main_menu_links"></a></li>
                    <li><a href="" class="main_menu_links"></a></li>
                </ul>
            </div>
            <div class="logo_box">
                <img src="" alt="logo" class="kleankey_logo">
            </div>
            <div class="nav_actions">
                <ul>
                    <li><img src="" alt="cloche de notifications" class="notification_bell"></li>
                    <li><img src="" alt="icône de profil" class="profile_icon"></li>
                    <li>
                        <div class="profile_box">
                            <div class="profile_box_name">
                                <p>{{-- $user->surname_user --}} {{-- str_pad($user->name_user, 1,'.', STR_PAD_RIGHT ) --}}</p>
                            </div>
                            <img src="" alt="flèche du menu déroulant" class="profile_box_arrow">
                        </div>
                        <div class="profile_options">
                            <ul>
                                <li><a href=""></a></li>
                                <li><a href=""></a></li>
                                <li><a href=""></a></li>
                                <li><a href=""></a></li>
                                <li><a href=""></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div>
            <div>
                <p class="footer_sentence">Service proprosé par</p>
            </div>
            <img src="" alt="" class="kleanetklair_logo">
        </div>
    </footer>
    
</body>
</html>