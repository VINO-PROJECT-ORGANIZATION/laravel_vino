<x-header-nav-sec></x-header-nav-sec>
<main>
    <h1>Mes celliers</h1>
    <div class="celliers-carte__actions">
        <div class="container">
            <a href="{{ route('celliers.create') }}" class="bouton">Créer un cellier</a>
        </div>
        <div class="container">
            <a href="{{ route('bouteilles.index') }}" class="bouton">Ajouter des bouteilles</a>
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