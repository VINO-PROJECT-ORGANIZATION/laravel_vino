<x-header-nav-sec :pageCourante="$pageCourante" />
<main class="enregistrement-form-page">
    <section class="enregistrement-form">
        <header>
            <h1>Création du nouveau mot de passe</h1>
        </header>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            @method('PUT')

            <!-- Jeton -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- Email -->
            <div class="groupe-input balise_courriel">
                <label for="email">Adresse courriel</label>
                <input id="email" type="email" name="email" value="{{ old('email', request('email')) }}" required
                    autofocus>
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Mot de passe -->
            <div class="groupe-input balise_password">
                <label for="password">Créez votre nouveau mot de passe</label>
                <input type="password" id="password" name="password" required>
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Confirmation du mot de passe -->
            <div class="groupe-input balise_password">
                <label for="password_confirmation">Veuillez confirmer le nouveau mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <div>
                <x-primary-button class="bouton">{{ __('Enregister') }}</x-primary-button>
                @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="">{{ __('Enregirstré.') }}</p>
                @endif
            </div>
        </form>
    </section>
</main>
<x-footer :pageCourante="$pageCourante" />