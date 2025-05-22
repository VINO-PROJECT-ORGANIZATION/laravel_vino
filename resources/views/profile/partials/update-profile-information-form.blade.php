<section class="update-profil-form">
    <header class="profile-entete">
        <h1 class="profile-entete-title">{{ $user['prenom']." ".$user['name'] }}</h1>
        <!-- à faire -->
        <p>{{ $user['email'] }}</p>
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
                    <h2 class="section__sous-titre-texte">Informations personnelles</h2>

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
                        <img src="./images/icons/map.svg" alt="carte">
                    </div>
                    <h2 class="section__sous-titre-texte">Adresse</h2>

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
                    </div>
                    <h2 class="section__sous-titre-texte">Mot de passe</h2>
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
                <div class="groupe-input" hidden>
                    <label for="password_email" hidden></label>
                    <input type="email" id="password_email" name="email" value="{{ $user['email'] }}" hidden>
                </div>
                <x-primary-button class="bouton">{{ __('Enregister') }}</x-primary-button>
                @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="">{{ __('Enregirstré.') }}</p>
                @endif
            </section>
        </form>
        <div class="margin-top">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')
                <input type="text" id="delete_user_id" name="delete_user_id" value="{{ $user['id'] }}" hidden>
                <button class="bouton bouton-danger" type="submit">Supprimer le compte</button>
            </form>
        </div>
    </div>
</section>