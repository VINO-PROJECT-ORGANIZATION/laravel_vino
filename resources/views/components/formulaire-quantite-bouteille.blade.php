<!-- Formulaire pour afficher le nombre de bouteilles identique dans le cellier -->
<form
    action="{{ route('cellier_bouteilles.update.quantite', ['cellier_id' => $reponse->cellier_id, 'bouteille_id' => $reponse->bouteille_id]) }}"
    method="POST" class="formulaire-quantite">
    @csrf
    @method('PUT')
    <div class="input-group">
        <label for="quantite">quantité</label>
        <input type="number" id="quantite" name="quantite" min="1" max="100" value="{{ $reponse->quantite }}">
    </div>
    <button type="submit" class="boutons">Mettre à jour la quantité</button>
</form>