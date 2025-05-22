@props(['pageCourante'])
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="author" content="Sebastien Malo Jean">
    <meta name="description" content="">
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=WindSong:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{asset('js/main.js')}}" type="module"></script>
    <title>{{ $pageCourante }}</title>

</head>

<body>
    @auth
    <header class="header__general">
        <nav class="header__nav-sec">
            <div class="header__nav-sec__logo">
                <a href="{{ route('accueil') }}">
                    <img src="{{asset('images/logo_vino.svg')}}" alt="logo">
                </a>
            </div>
            <div class="bouton bouton_nav" id="deconnecter">
                <span> <i class="fa fa-ellipsis-h"></i></span>
            </div>
        </nav>

        <div class="menu-deroulant invisible" id="menu-deroulant">
            <ul>
                <li><a href="{{ route('celliers.index') }}">Mes celliers</a></li>
                <li><a href="{{ route('bouteilles.index') }}">Liste des bouteilles</a></li>
                <li>

                <li><a href="{{ route('profile.edit') }}">Mon profil</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" value="Déconnexion" class="deconnexion">
                </form>
                </li>
            </ul>
        </div>

    </header>
    @else
    <header class="header__general">
        <nav class="header__nav-sec" style="justify-content: center;">
            <div class="header__nav-sec__logo">
                <a href="{{ route('accueil') }}">
                    <img src="{{asset('images/logo_vino.svg')}}" alt="logo">
                </a>
            </div>
        </nav>
    </header>
    @endauth
    <!-- boite de message d'erreurs -->
    @if (session('error'))
    <div class="boiteAlerte error" role="alert">
        {{ session('error') }}
        <button type="button" class="close-btn" aria-label="Close">×</button>
    </div>
    <!-- boite de message de succès -->
    @elseif (session('success'))
    <div class="boiteAlerte success" role="alert">
        {{ session('success') }}
        <button type="button" class="close-btn">x</button>
    </div>
    <!-- boite de message de succès -->
    @elseif (session('status'))
    <div class="boiteAlerte status error" role="alert">
        {{ session('status') }}
        <button type="button" class="close-btn">x</button>
    </div>
    @endif
    <script>
        // Fermeture des alertes lorsque le bouton de fermeture est cliqué
        document.querySelectorAll('.close-btn').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.boiteAlerte').style.display = 'none';
            });
        });
    </script>