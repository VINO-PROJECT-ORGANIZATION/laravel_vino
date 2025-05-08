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
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="./js/deconnexion.js" type="module"></script>
    <title>à changer</title>

</head>

<body>
    <header class="header__general">
        <nav class="header__nav-sec">
            <div class="bouton bouton_nav">
                <a href="{{ back()->getTargetUrl() }}" class="nav__link">
                    <img src="./images/icons/back.svg" alt="icone">
                     </a>
            </div>
            <div class="bouton bouton_nav" id="deconnecter">
                <p> ... </p>
            </div>
        </nav>


        <form method="POST" action="{{ route('logout') }}" class="invisible">
        @csrf

         <input type="submit" value="Déconnexion" class="deconnexion" >
        </form>

    </header>
 