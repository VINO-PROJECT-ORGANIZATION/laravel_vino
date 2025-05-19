<x-header-nav-sec></x-header-nav-sec>
<x-composante-recherche :pageCourante="$pageCourante" />

<main class="recherche-page">

    @if(empty($demande))
    <h1>Liste des Bouteilles</h1>
    @foreach ($bouteilles as $bouteille)
    <x-carte-bouteille-saq :bouteille="$bouteille" :pageCourante="$pageCourante" />
    @endforeach
    @else
    @if($reponses && $reponses->isEmpty())
    <section>
        <div>
            <h2>Recherche de : "{{$demande}}"</h2>
            <p>Désolé, aucun résultat trouvé.</p>
            <p>Essayez une autre recherche.</p>
        </div>
    </section>
    @else
    <h1>Résultats</h1>
    @foreach ($reponses as $reponse)
    <x-carte-bouteille-saq :bouteille="$reponse" :pageCourante="$pageCourante" />
    @endforeach
    <div class="pagination">
        {{ $reponses->links('pagination::default') }}
    </div>
    @endif
    @endif

</main>
<x-footer :pageCourante="$pageCourante"></x-footer>