<x-header-nav-sec :pageCourante="$pageCourante" />
<x-composante-recherche :pageCourante="$pageCourante" :pays="$listePays" />

<main class="recherche-page">
    @if ($bouteilles->isEmpty())
    <section>
        <div>
            @if ($demande)
            <h2>Recherche de : "{{ $demande }}"</h2>
            <p>Désolé, aucun résultat trouvé.</p>
            <p>Essayez une autre recherche.</p>
            @elseif(request()->hasAny(['type', 'format', 'pays']))
            <h2>Résultats filtrés</h2>
            <p>Désolé, aucun résultat trouvé avec ces filtres.</p>
            @else
            <h2>Aucune bouteille trouvée</h2>
            <p>La base de données semble vide pour l'instant.</p>
            @endif
        </div>
    </section>
    @else
    <section>
        @if ($demande)
        <h2>Résultats pour : "{{ $demande }}"</h2>
        @elseif(request()->hasAny(['type', 'format', 'pays']))
        <h2>Résultats filtrés</h2>
        @else
        <h2>Toutes les bouteilles</h2>
        @endif

        @foreach ($bouteilles as $bouteille)
        <x-carte-bouteille-saq :bouteille="$bouteille" :pageCourante="$pageCourante" />
        @endforeach

        <div class="pagination">
            {{ $bouteilles->withQueryString()->links('pagination::default') }}
        </div>
    </section>
    @endif
</main>

<x-footer :pageCourante="$pageCourante" />