<x-header-nav-sec />
<main class="enregistrement-form-page">
    <section class="enregistrement-form">
        <header>
            <h1>Connexion</h1>
        </header>
        <div class="enregistrement-form__container balise-form">
            <form method="POST" action="{{ route('login') }}" class="enregistrement-form__container__contenu">
                @csrf

                <!-- Email -->
                <div class="groupe-input balise_courriel">
                    <label for="email">Courriel</label>
                    <input type="email" id="email" name="email" required autofocus>
                    <x-input-error :messages="$errors->get('email')" />
                </div>
               

                <!-- Mot de passe -->
                <div class="groupe-input balise_password">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Lien vers la page d'inscription -->
                <div class="groupe-input balise-inscrire">
                    <p></p><a href="{{ route('password.request') }}">Mot de passe oublié</a>
                </div>
                <!-- Soumettre le formulaire -->
                <div class="groupe-input">
                    <button type="submit" class="boutons btn btn-primary">Se connecter</button>
                </div>

                <!-- Lien vers la page d'inscription -->
                <div class="groupe-input balise-inscrire">
                    <p>Pas encore inscrit ? </p><a href="{{ route('register') }}">Créez un compte ici</a>
                </div>
            </form>
        </div>
    </section>
</main>
<x-footer :pageCourante="$pageCourante" />