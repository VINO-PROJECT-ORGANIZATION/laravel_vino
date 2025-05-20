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
    <title>à changer</title>

</head>

<body>
    <header class="header__general">
        <nav class="header__nav-sec">
            <div class="bouton bouton_nav">
                <a href="{{ back()->getTargetUrl() }}" class="nav__link">
                    <!-- <img src="{{asset('images/icons/back.svg')}}" alt="icone"> -->
                    <span><i class="fa fa-chevron-left"></i></span>
                </a>
            </div>
            <div class="header__nav-sec__logo">
                <a href="{{ route('celliers.index') }}">
                    <img src="{{asset('images/logo_vino.svg')}}" alt="logo">
                </a>
            </div>
            <div class="bouton bouton_nav" id="deconnecter">
                <span> <i class="fa fa-ellipsis-h"></i></span>
            </div>
        </nav>


        <form method="POST" id="form-deconnexion" action="{{ route('logout') }}" class="invisible">
            @csrf

            <input type="submit" value="Déconnexion" class="deconnexion">
        </form>

    </header>
    <!-- boite de message d'erreurs -->
    @if ($errors->any())
    <div class="boiteAlerte error" role="alert">
        {{ session('error') }}
        <button type="button" class="close-btn" aria-label="Close">×</button>
    </div>
    @endif
    <!-- boite de message de succès -->
    @if (session('success'))
    <div class="boiteAlerte success" role="alert">
        {{ session('success') }}
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