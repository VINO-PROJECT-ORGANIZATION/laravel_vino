<!-- Formulaire pour afficher le nombre de bouteilles identique dans le cellier -->
<form
    action="{{ route('cellier_bouteilles.update.quantite', ['cellier_id' => $reponse->cellier_id, 'bouteille_id' => $reponse->bouteille_id]) }}"
    method="POST" class="formulaire-quantite">
    @csrf
    @method('PUT')
    <div class="input-group">
        <label for="quantite">Quantité</label>
        <input type="number" id="quantite" name="quantite" min="1" value="{{ $reponse->quantite }}">
        <button type="submit" class="bouton secondaire">Confirmer</button>
    </div>

</form>