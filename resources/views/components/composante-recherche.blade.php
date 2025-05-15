<div class="recherche">


    <form action="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => session('id_cellier')]) }}"
        method="GET" class="form-recherche-cellier" id="form-recherche-cellier">
        <label for="requete" class="invisible">
        </label>
        <input type="text" name="requete" placeholder="Entrez un nom ..." id="input-recherche-cellier"
            value="{{ old('requete', $query ?? '')}}">


        <button type="submit" id="bouton-recherche-cellier" class="contenant_loupe">
            <img src="{{asset('images/icons/Loupe.svg')}}" alt="loupe">

        </button>
    </form>


</div>