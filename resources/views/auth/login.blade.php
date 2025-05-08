<x-header-nav-sec />
<main>
    <section class="enregistrement-form">
        <header>
            <h1>Connexion</h1>
        </header>
        <div class="enregistrement-form__container">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="groupe-input">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required autofocus>
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Mot de passe -->
                <div class="groupe-input">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Soumettre le formulaire -->
                <div class="groupe-input">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>

                <!-- Lien vers la page d'inscription -->
                <div class="groupe-input">
                    <p>Pas encore inscrit ? <a href="{{ route('register') }}">Créez un compte ici</a></p>
                </div>
            </form>
        </div>
    </section>
</main>
<x-footer :pageCourante="$pageCourante" />