<x-header-nav-sec></x-header-nav-sec>
<main>
    <h1>Mes celliers</h1>
    <div class="container">
        @foreach ($celliers as $cellier)
        <!-- TEST -->
        <section class="carte-cellier @if ($cellier->teinte == '#F28B82') rouge-framboise
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

            <a href="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => $cellier->id]) }}">
                <h2>{{ $cellier['nom'] }}</h2>
            </a>
            {{ $quantiteBouteilles[$cellier->id] }} bouteilles
        </section>
        @endforeach
        <!-- afficher le nombre de bouteille par cellier -->

    </div>
    <div class="container">
        <a href="{{ route('celliers.create') }}" class="btn btn-primary">Créer un cellier</a>
    </div>
    <div class="container">
        <a href="{{ route('bouteilles.index') }}" class="btn btn-primary">Ajouter des bouteilles</a>
    </div>

</main>
<x-footer :pageCourante="$pageCourante"></x-footer>