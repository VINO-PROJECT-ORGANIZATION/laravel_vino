<div class="carte">
    <div class="contenant">
        <div class="contenant_img">
            <img src="{{$bouteille->url_image}}" alt="bouteille">
        </div>
        <div class="plateau
            @if($bouteille->type == 'Vin rouge')
                vin-rouge
            @elseif($bouteille->type == 'Vin blanc')
                vin-blanc
            @elseif($bouteille->type == 'Vin rosé')
                vin-rose
            @else
                vin-rouge
            @endif">

        </div>
    </div>

    <div class="detail">
        <div class="description">
            <div class="desc">
                <h3>{{ $bouteille->nom }}</h3>
                <div class="texte">
                    <p>{{$bouteille->type}} | {{$bouteille->format}} | {{$bouteille->pays}}</p>
                    <p>Code SAQ {{$bouteille->code_saq}}</p>
                </div>
            </div>

            @if ($pageCourante == 'bouteillesParCellier')
            <!-- bouton de supression de la bouteille du cellier -->
            <form method="POST"
                action="{{ route('cellier_bouteilles.destroy', ['cellier_id' => $reponse->cellier_id, 'bouteille_id' => $reponse->bouteille_id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bouton-danger">X</button>
            </form>

            @endif
        </div>
        <div class="action">
            <div class="note">

                <!-- Calcul de la note -->
                @php
                // Récupération de la note, avec une valeur par défaut de 0 si NULL
                $note = $bouteille->note_saq ?? 0;

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


            <div class="espace-bouton">
                <a class="bouton" href="{{ route('cellier_bouteilles.create', ['id' => $bouteille->id]) }}">
                    Ajouter au cellier
                </a>
            </div>
        </div>
    </div>
</div>