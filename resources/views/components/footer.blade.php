@props(['pageCourante'])
<footer class="pied">
    <div class="@if($pageCourante == 'celliers') active @endif">
        <div class=" conteneur">
            <img src="./images/icons/celliers.svg" alt="celliers">
        </div>
        <p>Celliers</p>
    </div>

    <div class="@if($pageCourante == '') active @endif">
        <a href="">

            <div class="conteneur">
                <img src="./images/icons/tirebouchon.svg" alt="tirebouchon">
            </div>
            <p>Bouteilles</p>
        </a>

        </a>
    </div>

    <div class="@if($pageCourante == 'bouteilles') active @endif">
        <!-- lien vers la page des bouteilles -->
        <a href="{{ route('bouteilles.index') }}">

            <div class="conteneur">
                <img src="./images/icons/loupe.svg" alt="loupe">
            </div>
            <p>Recherche</p>
        </a>
    </div>

    <div class="@if($pageCourante == 'profil') active @endif">
        <a href="{{ route('profile.edit') }}">
            <div class="conteneur">
                <img src="./images/icons/user.svg" alt="utilisateur">
            </div>
            <p>Profil</p>
        </a>
    </div>

</footer>

</body>

</html>