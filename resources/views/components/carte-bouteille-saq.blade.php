<div class="carte">
    <div class="contenant">
        <div class="contenant_img">
            <img src="{{$bouteille['url_image']}}" alt="bouteille">
        </div>
        <div class="plateau
            @if($bouteille['type'] == 'Vin rouge')
                vin-rouge
            @elseif($bouteille['type'] == 'Vin blanc')
                vin-blanc
            @elseif($bouteille['type'] == 'Vin rosé')
                vin-rose
            @else
                vin-rouge
            @endif">

        </div>
    </div>

    <div class="detail">
        <div class="description">
            <div class="desc">
                <h3>{{ $bouteille['nom'] }}</h3>
                <div class="texte">
                    <p>{{$bouteille['type']}} | {{$bouteille['format']}} | {{$bouteille['pays']}}</p>
                    <p>{{$bouteille['code_saq']}}</p>
                </div>
            </div>

            <div class="favori">
                <!-- à ajouter à la table de jointure -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 25" fill="none" class="fav">
                    <path
                        d="M13.3134 0.5C20.0677 0.500217 25.4999 5.70381 25.4999 12.0703C25.4996 18.4366 20.0675 23.6394 13.3134 23.6396C6.559 23.6396 1.12613 18.4367 1.12585 12.0703C1.12585 5.70368 6.55883 0.5 13.3134 0.5Z"
                        fill="white" stroke="#DFDFDF" />
                    <path
                        d="M16.8897 9.19953C16.6831 9.00408 16.4377 8.84903 16.1676 8.74324C15.8975 8.63746 15.608 8.58301 15.3157 8.58301C15.0234 8.58301 14.7339 8.63746 14.4638 8.74324C14.1937 8.84903 13.9484 9.00408 13.7417 9.19953L13.3128 9.60498L12.8839 9.19953C12.4664 8.80491 11.9002 8.58321 11.3099 8.58321C10.7195 8.58321 10.1533 8.80491 9.73584 9.19953C9.31839 9.59415 9.08386 10.1294 9.08386 10.6875C9.08386 11.2455 9.31839 11.7808 9.73584 12.1754L10.1647 12.5808L13.3128 15.5567L16.4608 12.5808L16.8897 12.1754C17.0965 11.98 17.2605 11.7481 17.3724 11.4928C17.4843 11.2375 17.5419 10.9638 17.5419 10.6875C17.5419 10.4111 17.4843 10.1375 17.3724 9.88216C17.2605 9.62686 17.0965 9.3949 16.8897 9.19953Z"
                        fill="#980A20" />
                </svg>



                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none" id="fav">
  <path d="M13.3965 0.5C20.1018 0.500216 25.5 5.70079 25.5 12.0703C25.4997 18.4396 20.1016 23.6394 13.3965 23.6396C6.69113 23.6396 1.29226 18.4397 1.29199 12.0703C1.29199 5.70066 6.69096 0.5 13.3965 0.5Z" fill="white" stroke="#DFDFDF"/>
  <path d="M16.9492 9.19953C16.7439 9.00408 16.5002 8.84903 16.2318 8.74324C15.9635 8.63746 15.676 8.58301 15.3855 8.58301C15.0951 8.58301 14.8075 8.63746 14.5392 8.74324C14.2709 8.84903 14.0271 9.00408 13.8218 9.19953L13.3957 9.60498L12.9696 9.19953C12.5549 8.80491 11.9924 8.58321 11.4059 8.58321C10.8194 8.58321 10.2569 8.80491 9.84217 9.19953C9.42745 9.59415 9.19446 10.1294 9.19446 10.6875C9.19446 11.2455 9.42745 11.7808 9.84217 12.1754L10.2683 12.5808L13.3957 15.5567L16.5231 12.5808L16.9492 12.1754C17.1547 11.98 17.3176 11.7481 17.4288 11.4928C17.54 11.2375 17.5972 10.9638 17.5972 10.6875C17.5972 10.4111 17.54 10.1375 17.4288 9.88216C17.3176 9.62686 17.1547 9.3949 16.9492 9.19953Z" fill="#D3D3D3"/>
</svg> -->
            </div>
        </div>
        <div class="action">
            <div class="note">
                <!-- Calcul de la note -->
                @php
                // Récupération de la note, avec une valeur par défaut de 0 si NULL
                $note = $bouteille['note_saq'] ?? 0;

                // Si la note est entre 0 et 100, on la normalise pour les étoiles
                // Le maximum est 5 étoiles, chaque étoile représentant 20 points
                $stars = floor($note / 20); // Nombre d'étoiles pleines
                $half_star = ($note % 20) >= 10 ? 1 : 0; // Une étoile partielle si le reste est >= 10
                @endphp

                <!-- Affichage des étoiles -->
                @if ($note !== null)
                <!-- Si la note n'est pas NULL -->
                @for ($i = 1; $i <= 5; $i++) @if ($i <=$stars) <!-- Étoile pleine (jaune) -->
                    <svg class="etoile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="goldenrod">
                        <path
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                    </svg>
                    @elseif ($i == $stars + 1 && $half_star)
                    <!-- Étoile partielle (jaune) -->
                    <svg class="etoile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"
                            fill="goldenrod" />
                    </svg>
                    @else
                    <!-- Étoile vide (grise) -->
                    <svg class="etoile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="gray">
                        <path
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                    </svg>
                    @endif
                    @endfor
                    @endif
            </div>


            <div class="bouton">
                <a href="">
                    Ajouter à un cellier
                </a>
            </div>
        </div>
    </div>
</div>