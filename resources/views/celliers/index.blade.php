<x-header-nav-sec></x-header-nav-sec>
<main>
    <h1>Mes celliers</h1>
    <div class="container">
        @foreach ($celliers as $cellier)
        <!-- TEST -->
        <section class="celliers-carte">
            <div class="celliers-carte__image
            @if ($cellier->teinte == '#F28B82') rouge-framboise
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
            <a href="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => $cellier->id]) }}">
                <h2 class="celliers-carte__titre">{{ $cellier['nom'] }}</h2>
            </a>
            <p class="celliers-carte__description">{{ $quantiteBouteilles[$cellier->id] }} bouteille(s)</p>
            <!-- edition du cellier -->

            <!-- fin edition du cellier -->
        </section>
        @endforeach
        <!-- afficher le nombre de bouteille par cellier -->

    </div>
    <div class="container">
        <a href="{{ route('celliers.create') }}">Créer un cellier</a>
    </div>
    <div class="container">
        <a href="{{ route('bouteilles.index') }}">Ajouter des bouteilles</a>
    </div>

</main>
<x-footer :pageCourante="$pageCourante"></x-footer>