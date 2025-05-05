@props(['pageCourante'])
<footer class="pied">
    <div class="@if($pageCourante == 'celliers') active @endif">
        <div class=" conteneur">
            <img src="./images/icons/celliers.svg" alt="icon">
        </div>
        <p>Celliers</p>
    </div>

    <div class="@if($pageCourante == '') active @endif">
        <div class="conteneur">
            <img src="./images/icons/tirebouchon.svg" alt="icon">
        </div>
        <p>Bouteilles</p>
        </a>
    </div>

    <div class="@if($pageCourante == 'bouteilles') active @endif">
        <!-- lien vers la page des bouteilles -->
        <a href="{{ route('bouteilles.index') }}">

            <div class="conteneur">
                <img src="./images/icons/Loupe.svg" alt="icon">
            </div>
            <p>Recherche</p>
        </a>
    </div>

    <div class="@if($pageCourante == 'celliers') active @endif">
        <div class="conteneur">
            <img src="./images/icons/user.svg" alt="icon">
        </div>
        <p>Profil</p>
    </div>

    </foote>

    </body>

    </html>