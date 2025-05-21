<x-header-nav-sec />

<main class="cellier-page">
    <h1 class="celliers-carte__titre">{{ $cellier->nom }}</h1>



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
        <section>
            <!-- liens pour modifier & supprimer un cellier -->
            <div class="celliers-carte__actions">

                <div class="container"><a href="{{ route('celliers.edit', ['id' => $cellier->id]) }}" class="bouton bouton-warning"> <i class="fa fa-pencil-square-o"></i> <span> Modifier le
                            cellier</span></a>
                </div>
                <div class="container">
                    <form action="{{ route('celliers.destroy', ['id' => $cellier->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bouton bouton-danger"> <i class="fa fa-trash-o"></i><span> Supprimer le cellier</span></button>
                    </form>
                </div>

            </div>
        </section>
        
        <section class="section-recherche">
            <h2 class="section-recherche__titre">Recherche de bouteilles dans le cellier</h2>
            <x-composante-recherche :pageCourante="$pageCourante" :pays="$listePays" />
        </section>

        <div>
            <a href="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => session('id_cellier')]) }}">Tous
                les résultats</a>
        </div>
        @if($bouteilles->isEmpty())
        <section>
            <div>
                <h2>Recherche de : "{{$demande}}"</h2>
                <ul>Désolé, aucun résultat trouvé.
                    <li>Essayez une autre recherche</li>
                    <br>
                    
                </ul>
            </div>
        </section>
        @else
        @foreach ($bouteilles as $reponse)
        <x-carte-bouteille-saq :bouteille="$reponse->bouteille" :pageCourante="$pageCourante" :reponse="$reponse" />
        <x-formulaire-quantite-bouteille :reponse="$reponse" />
        @endforeach
        @endif
</main>
<x-footer :pageCourante="$pageCourante" />