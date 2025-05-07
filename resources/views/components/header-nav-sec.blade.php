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
            <div class="bouton bouton_nav">
                <p> ... </p>
            </div>
        </nav>


        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <!-- <a class="deconnexion" href="{{ route('logout') }}">Logout</a> -->
         <input type="submit" value="Deconnexion" class="deconnexion" >
        </form>

        <div class="recherche">
            <label for="requete" class="invisible">
            </label> 
            <input type="text" name="requete" placeholder="Entrez un nom ...">
           
          
            <div class="contenant_loupe">
                <img src="./images/icons/Loupe.svg" alt="loupe">
            </div>
        </div>

        <!-- cette section est actuellement cachée sur la page -->
        <div class="choix">
            <div class="filtres">
                <p>Filtres</p>
            </div>
            <div class="option">
                <p>Options</p>
            </div>
        </div>


        

    </header>