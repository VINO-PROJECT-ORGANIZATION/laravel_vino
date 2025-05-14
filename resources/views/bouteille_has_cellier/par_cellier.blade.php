<x-header-nav-sec />
<main class="cellier-page">

    <div class="container">
        <div class="celliers-carte__actions">
            <a href="{{ route('celliers.edit', $cellier->id) }}" class="bouton bouton-warning">Modifier</a>
            <form method="POST" action="{{ route('celliers.destroy', $cellier->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bouton bouton-danger">Supprimer</button>
            </form>
        </div>

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


            <!-- <div class="boutons">Ajouter une bouteille</div> -->


            <!-- afficher le nombre de bouteille par cellier -->

            <h1 class="celliers-carte__titre">{{ $cellier->nom }}</h1>
            <!-- example de bouteilles par cellier -->
            @foreach ($bouteilles as $bouteille)
            <x-carte-bouteille-saq :bouteille="$bouteille->bouteille" />
            <div class="bouteille-cellier">
                <p>Quantité: {{ $bouteille->quantite }}</p>
            </div>
            <!-- formulaire pour suprimer une bouteille -->
            <form method="POST"
                action="{{ route('cellier_bouteilles.destroy', ['cellier_id' => $bouteille->cellier_id, 'bouteille_id' => $bouteille->bouteille_id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="boutons">Consommer une bouteille</button>
            </form>
        </section>
        @endforeach
        </container>
</main>
<x-footer :pageCourante="$pageCourante" />