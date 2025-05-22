<x-header-nav-sec :pageCourante="$pageCourante" />
<main>
    <div class="edit_cellier">
        <h1>Création de cellier</h1>
        <form method="POST" action="{{ route('celliers.store') }}">
            @csrf
            <div>
                <div class="groupe-input">
                    <label for="nom">Nom du cellier</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="groupe-input">
                    <label for="teinte">Teinte de fond</label>
                    <select name="teinte" id="teinte" required>
                        <option value="" selected>Choisir option</option>
                        <option value="#F28B82" class="rouge-framboise">Rouge Framboise pastel</option>
                        <option value="#FBC4AB" class="rose-peche">Rosé Pêche</option>
                        <option value="#FDF6E3" class="blanc-vanille">Blanc Vanille</option>
                        <option value="#CDEAC0" class="sauge-pale">Sauge pâle</option>
                        <option value="#E6E6FA" class="lavande-brume">Lavande brume</option>
                        <option value="#D1F2EB" class="menthe-douce">Menthe douce</option>
                        <option value="#AEDFF7" class="bleu-ciel">Bleu Ciel</option>
                        <option value="#FFF1D0" class="champagne-pale">Champagne pâle</option>
                        <option value="#FFD1DC" class="corail-pastel">Corail pastel</option>
                        <option value="#E5E5E5" class="gris-perle">Gris perle</option>
                    </select>
                </div>
                <label for="user_id" hidden></label>
                <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden>
            </div>
            <button type="submit" class="bouton">Créer</button>
        </form>
    </div>
</main>
<x-footer :pageCourante="$pageCourante" />