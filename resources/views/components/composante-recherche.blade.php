@props(['pageCourante'])
<div class="recherche">

    @if($pageCourante === 'bouteillesParCellier')
    <form action="{{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => session('id_cellier')]) }}"
        method="GET" class="form-recherche-cellier" id="form-recherche-cellier" >
        <label for="requete" class="invisible">
        </label>
        <input type="text" name="requete" placeholder="Faire une recherche..." id="input-recherche-cellier"
            value="{{ old('requete', $query ?? '')}}">


        <button type="submit" id="bouton-recherche-cellier" class="contenant_loupe">
            <img src="{{asset('images/icons/Loupe.svg')}}" alt="loupe">

        </button>
    </form>
@else
<form action="{{ route('bouteilles.index') }}"
        method="GET" class="form-recherche-cellier " id="form-recherche-cellier">
        <label for="requete" class="invisible">
        </label>
        <input type="text" name="requete" placeholder="Faire une recherche..." id="input-recherche-cellier"
            value="{{ old('requete', $query ?? '')}}">


        <button type="submit" id="bouton-recherche-cellier" class="contenant_loupe">
            <img src="{{asset('images/icons/Loupe.svg')}}" alt="loupe">

        </button>
    </form>
@endif
   
</div>