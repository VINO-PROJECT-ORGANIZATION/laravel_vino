@php
use Illuminate\Support\Str;
@endphp
<section class="celliers-carte">
    <a href="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => $cellier->id]) }}">
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
            <div class="celliers-carte__contenu">
                <h2 class="celliers-carte__titre">{{ Str::limit($cellier['nom'], 23) }}</h2>

                <!-- afficher le nombre de bouteille par cellier -->
                <p class="celliers-carte__description">{{ $quantiteBouteilles[$cellier->id] }} bouteille(s)</p>
            </div>
        </div>
    </a>
</section>