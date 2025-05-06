<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="balise-form">



        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <div class="balise_courriel">
                    <x-input-label for="email" :value="__('COURRIEL')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                </div>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <div class="balise_password">
                    <x-input-label for="password" :value="__('MOT DE PASSE')" />
                    <div class="logo">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                        <div class="conteneur_logo invisible">

                            <!-- ajout de l'icone de visibilite -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 14" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.871826 7C2.04213 2.943 5.52364 0 9.63716 0C13.7507 0 17.2322 2.943 18.4025 7C17.2322 11.057 13.7507 14 9.63716 14C5.52364 14 2.04213 11.057 0.871826 7ZM13.3116 7C13.3116 8.06087 12.9245 9.07828 12.2354 9.82843C11.5463 10.5786 10.6117 11 9.63716 11C8.66264 11 7.72804 10.5786 7.03895 9.82843C6.34986 9.07828 5.96274 8.06087 5.96274 7C5.96274 5.93913 6.34986 4.92172 7.03895 4.17157C7.72804 3.42143 8.66264 3 9.63716 3C10.6117 3 11.5463 3.42143 12.2354 4.17157C12.9245 4.92172 13.3116 5.93913 13.3116 7Z"
                                    fill="#B4B9CA" />
                            </svg>

                        </div>
                    </div>
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->


            <div class="balise_souvenir">

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 password"
                        href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié') }}
                    </a>
                    @endif
                </div>

            </div>


            <x-primary-button class="boutons">
                {{ __('SE CONNECTER') }}
            </x-primary-button>
        </form>



        <div class="balise-inscrire">
            <p>Vous n'avez pas de compte?</p>
            <a href="{{ route('register') }}">S'inscrire</a>
        </div>

    </div>



</x-guest-layout>
<x-footer :pageCourante="$pageCourante"></x-footer>