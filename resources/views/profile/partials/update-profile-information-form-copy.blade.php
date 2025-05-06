<section class="update-profil-form">
    <header>
        <h2>{{ $user['name'] }}</h2>
        <!-- à faire -->
        <p># cellier(s) - 53 Bouteilles</p>
    </header>
    <div class="conteneur">
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('update')
            <section>
                <div class="section__sous-titre">
                    <img src="./images/icons/user.svg" alt="utilisateur">
                    <h3>Informations personnelles</h3>
                    <img src="./images/icons/back.svg" alt="chevron">
                </div>
                <div class="groupe-input">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="name" value="{{ $user['name'] }}" required>
                </div>
                <div class="groupe-input">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="{{ $user['prenom'] }}" required>
                </div>
                <div class="groupe-input">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" value="{{ $user['date_naissance'] }}"
                        required>
                </div>
            </section>
            <section>
                <div class="section__sous-titre">
                    <img src="./images/icons/courriel.svg" alt="email">
                    <h3>Adresse</h3>
                    <img src="./images/icons/back.svg" alt="chevron">
                </div>
                <div class="groupe-input">
                    <label for="adresse">Adresse</label>
                    <textarea name="adresse" id="adresse"></textarea>
                </div>
            </section>
        </form>
    </div>
</section>