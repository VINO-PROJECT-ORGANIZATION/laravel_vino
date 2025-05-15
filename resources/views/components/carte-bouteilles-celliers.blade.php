<section class="carte__bouteilles-celliers">
    <div class="contenant">
        <div class="contenant_img">
            <img src="{{ $bouteille->bouteille->url_image }}" alt="bouteille">
        </div>
        <div class="plateau
            @if($bouteille->bouteille->type == 'Vin rouge')
                vin-rouge
            @elseif($bouteille->bouteille->type == 'Vin blanc')
                vin-blanc
            @elseif($bouteille->bouteille->type == 'Vin rosé')
                vin-rose
            @else
                vin-rouge
            @endif">
        </div>
        <div class="detail">
            <div class="description">
                <div class="desc">
                    <h3>{{ $bouteille->bouteille->nom }}</h3>
                    <div class="texte">
                        <p>{{ $bouteille->bouteille->type }} | {{ $bouteille->bouteille->format }} |
                            {{ $bouteille->bouteille->pays }}</p>
                        <p>{{ $bouteille->bouteille->code_saq }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>