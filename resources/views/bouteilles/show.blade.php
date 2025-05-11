<h1>hell not!!!</h1>
<h1>hell yes!!!</h1>
<x-header-nav-sec/>


<main class="enregistrement-form-page">
    <section class="enregistrement-form">
        <header>
            <h1>Ajoutez une bouteille qui n'existe pas</h1>
        </header>
          
        <div class="enregistrement-form__container balise-form">
            <form method="POST" action="">
                
                <!-- Nom -->
                <div class="groupe-input balise_courriel">
                    <label for="nom">Nom de la bouteille</label>
                    <input type="text" id="nom" name="nom" required>
                    <div class="erreur invisible">
                        <p>erreur</p>
                    </div>
                
                </div>
                <div class="groupe-input balise_courriel">
                    <!-- Pays -->
                    <label for="pays">Pays d'origine</label>
                    <input type="text" id="pays" name="pays" required>
                        <div class="erreur invisible">
                        <p>erreur</p>
                    </div>
                
                </div>

                <!-- region -->
                <div class="groupe-input balise_courriel">
                    <label for="region">Région</label>
                    <input type="text" id="region" name="region" required>
                        <div class="erreur invisible">
                        <p>erreur</p>
                    </div>
                
                </div>
 
                <!-- type -->
                <div class="groupe-input balise_courriel">
                    <label for="type">Type de vin</label>
                    <select name="type" id="type" required>
                        <option value="rouge" selected>rouge</option>
                        <option value="blanc">blanc</option>
                        <option value="rosé">rosé</option>
                    </select>
                        <div class="erreur invisible">
                        <p>erreur</p>
                    </div>
                
                </div>

                 <!-- Volume -->
                <div class="groupe-input balise_courriel">
                    <label for="format">Volume</label>
                    <input type="number" id="format" name="format" required>
                    <div class="erreur invisible">
                        <p>erreur</p>
                    </div>
                
                </div>

                <!-- degre alcool -->
                <div class="groupe-input balise_courriel">
                    <label for="degre_alcool">Taux d'alcool</label>
                    <input type="number" id="degre_alcool" name="degre_alcool" required>
                    <div class="erreur invisible">
                        <p>erreur</p>
                    </div>
                
                </div>
          
                <!-- Soumettre le formulaire -->
                <div class="groupe-input balise_courriel">
                    <button type="submit" class="boutons btn btn-primary" disabled>Créer la bouteille</button>
                </div>
          
            </form>
        </div>
    </section>
</main>
