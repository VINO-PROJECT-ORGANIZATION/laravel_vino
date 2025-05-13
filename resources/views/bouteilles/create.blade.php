<x-header-nav-sec />
<main>
    <h1>Création de bouteille dans le cellier</h1>
    <form method="POST" action="{{ route('bouteilles.store') }}">
        @csrf
        <!-- Nom de la bouteille -->
        <div class="groupe-input balise_courriel">
            <label for="nom">Nom de la bouteille</label>
            <input type="text" id="nom" name="nom" required autofocus>
            <x-input-error :messages="$errors->get('nom')" />
        </div>

        <!-- Pays de la bouteille -->
        <div class="groupe-input balise_courriel">
            <label for="pays">Pays d'origine de la bouteille</label>
            <input type="text" id="pays" name="pays" required autofocus>
            <x-input-error :messages="$errors->get('pays')" />
        </div>

        <!-- Format de la bouteille -->
        <div class="groupe-input balise_courriel">
            <label for="format">Format de la bouteille</label>
            <input type="text" id="format" name="format" required autofocus>
            <x-input-error :messages="$errors->get('pays')" />
        </div>

        <!-- Degre d'alcool de la bouteille -->
        <div class="groupe-input balise_courriel">
            <label for="degre_alcool">Degre d'alcool de la bouteille</label>
            <input type="text" id="degre_alcool" name="degre_alcool" required autofocus>
            <x-input-error :messages="$errors->get('degre_alcool')" />
        </div>

        <!-- Region de la bouteille -->
        <div class="groupe-input balise_courriel">
            <label for="region">Région de la bouteille</label>
            <input type="text" id="region" name="region" required autofocus>
            <x-input-error :messages="$errors->get('region')" />
        </div>

        <!-- Type de vin de la bouteille -->
        <!-- <div class="groupe-input balise_courriel">
            <label for="type">Type de vin</label>
            <input type="text" id="type" name="type" required autofocus>
            <x-input-error :messages="$errors->get('type')" />
        </div> -->

        <!-- Type de vin de la bouteille, à changer pour une liste déroulante -->
        <div class="groupe-input balise_courriel">
            <label for="type">Type de vin</label>
            <select id="type" name="type" required>
                <option value="">Sélectionner un type de vin</option>
                <option value="Rouge">Vin rouge</option>
                <option value="Blanc">Vin blanc</option>
                <option value="Rose">Vin rosé</option>
            </select>
            <x-input-error :messages="$errors->get('type')" />
        </div>
        <!-- <p>Date('mY')$bouteille->id</p> -->

        <!--display date in format YYYYMMDDms-->
        <!-- <p>{{ date('ymdms') }}</p> -->

        <!-- Option 01 - code saq unique généré par la date et l'heure -->
        <!-- {{ $code_saq_unique = date('ymdms') }} -->

        <!-- display user id -->
        <p>{{ $user_id = Auth::user()->id }}</p>

        <!-- Bouteille personnalisée -->
        <div class="groupe-input balise_courriel ">
            <label for="code_saq" hidden>Code SAQ</label>
            <input type="text" id="code_saq" name="code_saq" hidden value="{{ $code_saq }}">
        </div>

        <!-- comment valider que personne ne le fait en même temps? -->


        <!-- Bouteille personnalisée -->
        <!-- <div class="groupe-input balise_courriel ">
            <label for="personnalise" hidden>Bouteille personnalisée</label>
            <input type="checkbox" id="personnalise" name="personnalise" hidden value="1">
        </div> -->

        <!-- Quantité de bouteille -->
        <!-- <div class="groupe-input">
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" required>
            <x-input-error :messages="$errors->get('quantite')" />
        </div> -->


        <button type="submit">Créer</button>
        </div>
    </form>
</main>
<x-footer :pageCourante="$pageCourante" />