@props(['pageCourante'])
<footer class="pied">
    <div class="pied-section @if($pageCourante == 'celliers') active @endif">
        <!-- lien vers la page des celliers -->
        <div class="conteneur">
            <a href="{{ route('celliers.index') }}">
                <img src="{{asset('images/icons/celliers.svg')}}" alt="celliers">
                <span>Celliers</span>
            </a>
        </div>
    </div>

    <div class="pied-section @if($pageCourante == 'bouteilles') active @endif">
        <!-- lien vers la page des bouteilles -->
        <div class="conteneur">
            <a href="{{ route('bouteilles.index') }}">
                <img src="{{asset('images/icons/loupe.svg')}}" alt="loupe">
                <span>Bouteilles SAQ</span>
            </a>
        </div>
    </div>

    <div class="pied-section @if($pageCourante == 'profil') active @endif">
        <div class="conteneur">
            <!-- si il y a un usager connecté -->
            @if (Auth::check())
            <a href="{{ route('profile.edit') }}">
                <img src="{{asset('images/icons/user.svg')}}" alt="utilisateur">
                <span>Profil</span>
            </a>
            @else
            <a href="{{ route('login') }}">
                <img src="{{asset('images/icons/user.svg')}}" alt="utilisateur">
                <span>Connexion</span>
            </a>
            @endif
        </div>
    </div>

</footer>
</body>

</html>