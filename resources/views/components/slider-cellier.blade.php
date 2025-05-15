<section class="slider__cellier">
    <h2>Vos celliers</h2>
    <div class="slider__cellier_container">
        @forelse ($celliers as $cellier)
        <div class="slider__cellier-container-item">
            <x-carte-cellier :cellier="$cellier" :quantiteBouteilles="$quantiteBouteilles" />
        </div>
        @empty
        <div class="slider__cellier-container-item">
            <p>Vous n'avez pas de cellier !</p>
            <div class="bouton"><a href="{{ route("celliers.create") }}">Créé un cellier</a></div>
        </div>
        @endforelse
    </div>
</section>