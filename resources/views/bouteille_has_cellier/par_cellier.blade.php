<x-header-nav-sec />
<main>
    <h1>bouteilles du cellier "{{ $cellier->nom }}"

    </h1>
    <!-- example de bouteilles par cellier -->
    @foreach ($bouteilles as $bouteille)
    <div class="bouteille-cellier">
        <p>{{ $bouteille->bouteille->nom }}</p>
        <p>Quantité: {{ $bouteille->quantite }}</p>
    </div>
    <!-- formulaire pour suprimer une bouteille -->
    <form method="POST"
        action="{{ route('cellier_bouteilles.destroy', ['cellier_id' => $bouteille->cellier_id, 'bouteille_id' => $bouteille->bouteille_id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>

    @endforeach
</main>
<x-footer :pageCourante="$pageCourante" />