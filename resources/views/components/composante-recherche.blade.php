<div class="recherche">

            <form action="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => 1]) }}" method="GET" class = "form-recherche-cellier" class="{{ !empty($query) ? 'expanded' : '' }}" id="form-recherche-cellier">
                <label for="requete" class="invisible">
            </label> 
            <input type="text" name="requete" placeholder="Entrez un nom ..." id="input-recherche-cellier" value="{{ old('requete', $query ?? '')}}">
           
          
            <button type="submit" id="bouton-recherche-cellier"  class="contenant_loupe">
                <img src="{{asset('images/icons/Loupe.svg')}}" alt="loupe">
                
            </button>
            </form>
          
</div>


