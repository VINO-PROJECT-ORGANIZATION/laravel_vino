<x-header-nav-sec></x-header-nav-sec>
<main class="celliers-page">
    <h1>Mes celliers</h1>
    <div class="celliers-carte__actions">
        <div class="container">
            <a href="{{ route('celliers.create') }}" class="bouton"><img src="/images/icons/ajout-cellier.svg" alt=""> <span>Créer un cellier</span></a>
        </div>
        <div class="container">
            <a href="{{ route('bouteilles.index') }}" class="bouton secondaire"><img src="/images/icons/ajout-bouteille.svg" alt=""> <span>Nouvelle bouteille</span></a>
        </div>
    </div>
    <div class="container">
        @foreach ($celliers as $cellier)
        <!-- TEST -->
        <x-carte-cellier :cellier="$cellier" :quantiteBouteilles="$quantiteBouteilles" />

        @endforeach
    </div>
</main>
<x-footer :pageCourante="$pageCourante"></x-footer>