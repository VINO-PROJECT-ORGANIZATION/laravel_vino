<x-header-nav-sec />
<main>
    <h1>bouteilles par cellier</h1>
    <!-- example de bouteilles par cellier -->
    @foreach ($bouteilles as $bouteille)
    <div class="bouteille-cellier">
        <h2>{{ $bouteille->nom }}</h2>
        <p>Cellier: {{ $bouteille->cellier->nom }}</p>
        <p>Quantité: {{ $bouteille->quantite }}</p>
    </div>

    @endforeach
</main>
<x-footer :pageCourante="$pageCourante" />