@props(['pageCourante', 'pays'])

<div class="recherche">

    <form action="@if ($pageCourante === 'bouteillesParCellier') {{ route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => session('id_cellier')]) }} @else {{ route('bouteilles.index') }} @endif" method="GET" class="form-recherche-cellier"
        id="form-recherche-cellier">
        <section class="champ-recherche">
            <label for="requete" class="invisible">Recherche</label>
            <input type="text" name="requete" placeholder="Faire une recherche..." id="input-recherche-cellier"
                value=" @if ($pageCourante === 'bouteillesParCellier')  {{ old('requete', $query ?? '') }} @else {{ request('requete') }} @endif" />
            <button type="submit" id="bouton-recherche-cellier" class="contenant_loupe">
                <img src="{{ asset('images/icons/loupe.svg') }}" alt="loupe" />
            </button>
        </section>
        <section class="filtres">
            <div class="groupe-input">
                <label for="type">Type</label>
                <select name="type" id="type">
                    <option value="">types</option>
                    <option value="Vin rouge" @if (request('type')=="Vin rouge" ) selected @endif>Vin rouge</option>
                    <option value="Vin blanc" @if (request('type')=="Vin blanc" ) selected @endif>Vin blanc</option>
                    <option value="Vin rosé" @if (request('type')=="Vin rosé" ) selected @endif>Vin Rosé</option>
                    <option value="Vin de dessert" @if (request('type')=="Vin de dessert" ) selected @endif>Vin de
                        dessert</option>
                    <option value="Vin de tomate" @if (request('type')=="Vin de tomate" ) selected @endif>Vin de
                        tomate</option>
                </select>
            </div>
            <div class="groupe-input">
                <label for="pays">Pays</label>
                <select name="pays" id="pays">
                    <option value="">Pays</option>
                    @foreach ($pays as $p)
                    <option value="{{ $p }}" @if (request('pays')==$p) selected @endif>{{ $p }}</option>
                    @endforeach
                </select>
            </div>
            <div class="groupe-input">
                <!-- faire un select -->
                <label for="format">Format</label>
                <select name="format" id="format">
                    <option value="">format</option>
                    <option value="200 ml" @if(request('format')=="200 ml" ) selected @endif>200 ml</option>
                    <option value="250 ml" @if(request('format')=="250 ml" ) selected @endif>250 ml</option>
                    <option value="375 ml" @if(request('format')=="375 ml" ) selected @endif>375 ml</option>
                    <option value="500 ml" @if(request('format')=="500 ml" ) selected @endif>500 ml</option>
                    <option value="620 ml" @if(request('format')=="620 ml" ) selected @endif>620 ml</option>
                    <option value="700 ml" @if(request('format')=="700 ml" ) selected @endif>700 ml</option>
                    <option value="750 ml" @if(request('format')=="750 ml" ) selected @endif>750 ml</option>
                    <option value="1 L" @if(request('format')=="1 L" ) selected @endif>1 L</option>
                    <option value="1,5 L" @if(request('format')=="1,5 L" ) selected @endif>1,5 L</option>
                    <option value="2 L" @if(request('format')=="2 L" ) selected @endif>2 L</option>
                    <option value="2,25 L" @if(request('format')=="2,5 L" ) selected @endif>2,25 L</option>
                    <option value="3 L" @if(request('format')=="3 L" ) selected @endif>3 L</option>
                    <option value="4 L" @if(request('format')=="4 L" ) selected @endif>4 L</option>
                    <option value="5 L" @if(request('format')=="5 L" ) selected @endif>5 L</option>
                    <option value="6 L" @if(request('format')=="6 L" ) selected @endif>6 L</option>
                </select>
            </div>
        </section>
    </form>
 
</div>