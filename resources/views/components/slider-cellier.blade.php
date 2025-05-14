<section class="slider__cellier">
    <h2>Mes celliers</h2>
    <div class="slider__cellier_container">
        @foreach ($celliers as $cellier)
        <div class="slider__cellier-container-item">
            <x-carte-cellier :cellier="$cellier" :quantiteBouteilles="$quantiteBouteilles" />
        </div>
        @endforeach
    </div>
</section>