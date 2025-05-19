<main class="enregistrement-form-page">
    <section class="enregistrement-form">
        <header>
            <h1>Ajoutez une bouteille qui n'existe pas</h1>
        </header>

        <div class="enregistrement-form__container balise-form">
            <form method="POST" action="{{ route('bouteilles.store') }}" data-js-formulaire id="formulaire">
                @csrf
                @method('POST')
                <!-- Nom -->
                <div class="groupe-input balise_courriel" data-js-control-wrapper>
                    <label for="nom">Nom de la bouteille</label>
                    <input type="text" id="nom" name="name" required>
                    <div class="erreur invisible" data-js-erreur>
                        <p>erreur</p>
                    </div>

                </div>
                <div class="groupe-input balise_courriel" data-js-control-wrapper>
                    <!-- Pays -->
                    <label for="pays">Pays d'origine</label>
                    <input type="text" id="pays" name="pays" required>
                    <div class="erreur invisible" data-js-erreur>
                        <p>erreur</p>
                    </div>

                </div>

                <!-- region -->
                <div class="groupe-input balise_courriel" data-js-control-wrapper>
                    <label for="region">Région</label>
                    <input type="text" id="region" name="region" required>
                    <div class="erreur invisible" data-js-erreur>
                        <p>erreur</p>
                    </div>

                </div>

                <!-- type -->
                <div class="groupe-input balise_courriel" data-js-control-wrapper>
                    <label for="type">Type de vin</label>
                    <select name="type" id="type" required>
                        <option value="rouge" selected>rouge</option>
                        <option value="blanc">blanc</option>
                        <option value="rosé">rosé</option>
                    </select>
                    <div class="erreur invisible" data-js-erreur>
                        <p>erreur</p>
                    </div>

                </div>

                <!-- Volume -->
                <div class="groupe-input balise_courriel" data-js-control-wrapper>
                    <label for="format">Volume</label>
                    <input type="text" id="format" name="format" required>
                    <div class="erreur invisible" data-js-erreur>
                        <p>erreur</p>
                    </div>

                </div>

                <!-- degre alcool -->
                <div class="groupe-input balise_courriel" data-js-control-wrapper>
                    <label for="degre_alcool">Taux d'alcool</label>
                    <input type="number" id="degre_alcool" name="degre_alcool" required>
                    <div class="erreur invisible" data-js-erreur>
                        <p>erreur</p>
                    </div>
                </div>

                <!-- user_id -->
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                <!-- Soumettre le formulaire -->
                <div class="groupe-input balise_courriel">
                    <button type="submit" class="boutons" data-js-btn>Créer la bouteille</button>
                </div>

            </form>
        </div>
    </section>
</main>