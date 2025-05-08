<x-header-nav-sec />
<main>
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
                    <option value="0">Sélectionner une teinte</option>
                    <option value="#F28B82">Rouge Framboise pastel</option>
                    <option value="#FBC4AB">Rosé Pêche</option>
                    <option value="#FDF6E3">Blanc Vanille</option>
                    <option value="#CDEAC0">Sauge pâle</option>
                    <option value="#E6E6FA">Lavande brume</option>
                    <option value="#D1F2EB">Menthe douce</option>
                    <option value="#AEDFF7">Bleu Ciel</option>
                    <option value="#FFF1D0">Champagne pâle</option>
                    <option value="#FFD1DC">Corail pastel</option>
                    <option value="#E5E5E5">Gris perle</option>
                </select>
            </div>
            <label for="user_id" hidden></label>
            <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden>
        </div>
        <div class="container">
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>
</main>
<x-footer :pageCourante="$pageCourante" />