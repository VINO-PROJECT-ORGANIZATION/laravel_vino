<section class="update-profil-form">
    <header class="profile-entete">
        <h2 class="profile-entete-title">{{ $user['prenom']." ".$user['name'] }}</h2>
        <!-- à faire -->
        <p class="profile-entete-text"># cellier(s) - 53 Bouteille(s)</p>
    </header>
    <div class="conteneur">
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')
            <section>
                <div class="section__sous-titre">
                    <div class="section__icone-cercle">
                        <img src="./images/icons/user-profil.svg" alt="utilisateur">
                    </div>
                    <h3 class="section__sous-titre-texte">Informations personnelles</h3>
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
                    <div class="section__icone-cercle">
                        <img src="./images/icons/map.svg" alt="email">
                    </div>
                    <h3 class="section__sous-titre-texte">Adresse</h3>
                    <img src="./images/icons/back.svg" alt="chevron">
                </div>
                <div class="groupe-input">
                    <label for="adresse">Adresse</label>
                    <textarea name="adresse" id="adresse" required>{{ old('adresse', $user['adresse']) }}</textarea>
                </div>
            </section>
            <input type="email" id="email" name="email" value="{{ $user['email'] }}" hidden>

            <x-primary-button class="bouton">{{ __('Enregister') }}</x-primary-button>
        </form>
    </div>
    <div class="conteneur">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <section>
                <div class="section__sous-titre">
                    <div class="section__icone-cercle">
                        <img src="./images/icons/courriel.svg" alt="courriel">
                        <h3>Courriel & mot de passe</h3>
                        <img src="./images/icons/back.svg" alt="chevron">
                    </div>
                    <div class="groupe-input">
                        <label for="email">Courriel</label>
                        <input type="email" id="email" name="email" value="{{ $user['email'] }}" readonly>
                    </div>
                    <div class="groupe-input">
                        <label for="update_password_current_password">Mot de passe courrant</label>
                        <input type="password" id="update_password_current_password" name="current_password">
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" />
                    </div>
                    <div class="groupe-input">
                        <label for="update_password_password">Nouveau mot de passe</label>
                        <input type="password" id="update_password_password" name="password" required>
                        <x-input-error :messages="$errors->updatePassword->get('password')" />
                    </div>
                    <div class="groupe-input">
                        <label for="update_password_password_confirmation">Confirmer le mot de passe</label>
                        <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                            required>
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
                    </div>
            </section>
            <x-primary-button class="bouton">{{ __('Enregister') }}</x-primary-button>
            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="">{{ __('Enregirstré.') }}</p>
            @endif
        </form>
    </div>
</section>