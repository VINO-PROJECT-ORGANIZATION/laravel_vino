<x-header-nav-sec></x-header-nav-sec>

<main class="recherche-page">
    <h1>Résultats</h1>
    @foreach ($bouteilles as $bouteille)
    <x-carte-bouteille-saq :bouteille="$bouteille"></x-carte-bouteille-saq>
    @endforeach

    <div class="pagination">
        {{ $bouteilles->links('pagination::default') }}
    </div>
</main>
<x-footer :pageCourante="$pageCourante"></x-footer>