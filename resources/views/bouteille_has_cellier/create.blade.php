<x-header-nav-sec :pageCourante="$pageCourante" />
<main>
    <h1>ajout de bouteille dans le cellier</h1>
    <form method="POST" action="{{ route('cellier_bouteilles.store') }}">
        @csrf
        <div class="groupe-input">
            <label for="cellier_id">Cellier</label>
            <select name="cellier_id" id="cellier_id">
                @foreach ($celliers as $cellier)
                <option value="{{ $cellier->id }}">{{ $cellier->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="groupe-input">
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" required>
            <x-input-error :messages="$errors->get('quantite')" />
        </div>
        <!-- le id de la bouteille est dans l'url .../cellier-bouteilles/create?id=? -->

        <div class="groupe-input" hidden>
            <label for="bouteille_id">Bouteille</label>
            <input type="text" name="bouteille_id" id="bouteille_id" value="{{ $_GET["id"] }}" readonly>
        </div>
        <div class="groupe-input">
            <button type="submit" class="boutons">Ajouter</button>
        </div>
    </form>
</main>
<x-footer :pageCourante="$pageCourante" />