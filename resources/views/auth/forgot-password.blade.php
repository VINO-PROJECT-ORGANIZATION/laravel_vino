<x-header-nav-sec />
<main class="enregistrement-form-page">
    <section class="enregistrement-form">
        <header>
            <h1>Réanilisation du mot de passe</h1>
        </header>
        <div class="enregistrement-form__container balise-form">
            <form method="POST" action="{{ route('password.email') }}" class="enregistrement-form__container__contenu">
                @csrf


                <!-- Email -->
                <div class="groupe-input balise_courriel">
                    <label for="email">Veuillez entrer votre courriel afin de recevoir votre nouveau mot de passe</label>
                    <input type="email" id="email" name="email" required autofocus>
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Soumettre le formulaire -->
                <div class="groupe-input">
                    <button type="submit" class="boutons">Réinitialiser le mot de passe</button>
                </div>


            </form>
        </div>
    </section>
</main>
<x-footer :pageCourante="$pageCourante" />