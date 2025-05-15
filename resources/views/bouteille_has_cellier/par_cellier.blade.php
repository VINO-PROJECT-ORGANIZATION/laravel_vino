<x-header-nav-sec />
<x-composante-recherche />

<main class="cellier-page">

    @if (empty($query))


    @if($reponses->isEmpty())
    <section>
        <div>
            <h2>Recherche de : "{{$demande}}"</h2>
            <ul>Désolé, aucun résultat trouvé.
                <li>Essayez une autre recherche</li>
                <br>
                <a href="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => session('id_cellier')]) }}"
                    class="bouton">Retour au cellier</a>
            </ul>
        </div>
    </section>
    @else

    <section class="cellier-carte">
        <div class="cellier-carte__image @if ($cellier->teinte == '#F28B82') rouge-framboise
                @elseif ($cellier->teinte == '#FBC4AB') rose-peche
                @elseif ($cellier->teinte == '#FDF6E3') blanc-vanille
                @elseif ($cellier->teinte == '#CDEAC0') sauge-pale
                @elseif ($cellier->teinte == '#E6E6FA') lavande-brume
                @elseif ($cellier->teinte == '#D1F2EB') menthe-douce
                @elseif ($cellier->teinte == '#AEDFF7') bleu-ciel
                @elseif ($cellier->teinte == '#FFF1D0') champagne-pale
                @elseif ($cellier->teinte == '#FFD1DC') corail-pastel
                @elseif ($cellier->teinte == '#E5E5E5') gris-perle
            @endif">
            <img src="{{asset('images/icons/celliers-icon-01.svg')}}" alt="Image de cellier" />
        </div>

        <h1 class="celliers-carte__titre">{{ $cellier->nom }}</h1>


        <div>
            <a href="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => session('id_cellier')]) }}">Tous
                les resultats</a>
        </div>
        @foreach ($reponses as $reponse)
        <x-carte-bouteille-saq :bouteille="$reponse->bouteille" />
        <div class="bouteille-cellier">
            <p>Quantité: {{ $reponse->quantite }}</p>
        </div>

        <!-- formulaire pour suprimer une bouteille -->
        <form method="POST"
            action="{{ route('cellier_bouteilles.destroy', ['cellier_id' => $reponse->cellier_id, 'bouteille_id' => $reponse->bouteille_id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="boutons">Consommer une bouteille</button>
        </form>
    </section>
    @endforeach
    @endif
    @endif
    </container>
</main>
<x-footer :pageCourante="$pageCourante" />