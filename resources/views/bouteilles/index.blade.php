<x-header-nav-sec></x-header-nav-sec>
<x-composante-recherche :pageCourante="$pageCourante"/>

<main class="recherche-page">


    @if (empty($query))

  
    @if($reponses->isEmpty())
    
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


    <h1>Résultats</h1>
    @foreach ($reponses as $reponse)
    <x-carte-bouteille-saq :bouteille="$reponse"></x-carte-bouteille-saq>
    @endforeach

    <div class="pagination">
        {{ $bouteilles->links('pagination::default') }}
    </div>
    @endif
    @endif
</main>
<x-footer :pageCourante="$pageCourante"></x-footer>