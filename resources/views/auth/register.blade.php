<x-guest-layout>
    <div class="balise_form balise">

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <!-- Email Address -->
            <div class="mt-4">
                <div class="contenant">
                    <x-input-label for="email" :value="__('COURRIEL')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <!-- Name -->
            <div>
                <div class="contenant">
                    <x-input-label for="name" :value="__('NOM')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Prenom -->
            <div>
                <div class="contenant">
                    <x-input-label for="prenom" :value="__('PRENOM')" />
                    <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')"
                        required autofocus autocomplete="prenom" />
                </div>

                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>


            <!-- Date de Naissance -->
            <div>
                <div class="contenant">
                    <x-input-label for="date_naissance" :value="__('DATE DE NAISSANCE')" />
                    <x-text-input id="date_naissance" class="block mt-1 w-full" type="date" name="date_naissance"
                        :value="old('date_naissance')" required autofocus autocomplete="date_naissance" />
                </div>

                <x-input-error :messages="$errors->get('date_naissance')" class="mt-2" />
            </div>


            <!-- Addresse -->
            <div>
                <div class="contenant ">
                    <x-input-label for="addresse" :value="__('ADDRESSE')" />
                    <x-text-input id="addresse" class="block mt-1 w-full" type="text" name="addresse"
                        :value="old('addresse')" required autofocus autocomplete="addresse" />
                </div>

                <x-input-error :messages="$errors->get('addresse')" class="mt-2" />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <div class="contenant">
                    <x-input-label for="password" :value="__('MOT DE PASSE')" />

                    <div class="conteneur_icone">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />

                        <div class="icone invisible">
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

            <!-- Confirm Password -->
            <div class="mt-4">
                <div class="contenant">
                    <x-input-label for="password_confirmation" :value="__('RÉPÉTER LE MOT DE PASSE')"
                        class="input_contenant" />

                    <div class="conteneur_icone">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <div class=" icone invisible">

                            <!-- ajout de l'icone de visibilite -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 14" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.871826 7C2.04213 2.943 5.52364 0 9.63716 0C13.7507 0 17.2322 2.943 18.4025 7C17.2322 11.057 13.7507 14 9.63716 14C5.52364 14 2.04213 11.057 0.871826 7ZM13.3116 7C13.3116 8.06087 12.9245 9.07828 12.2354 9.82843C11.5463 10.5786 10.6117 11 9.63716 11C8.66264 11 7.72804 10.5786 7.03895 9.82843C6.34986 9.07828 5.96274 8.06087 5.96274 7C5.96274 5.93913 6.34986 4.92172 7.03895 4.17157C7.72804 3.42143 8.66264 3 9.63716 3C10.6117 3 11.5463 3.42143 12.2354 4.17157C12.9245 4.92172 13.3116 5.93913 13.3116 7Z"
                                    fill="#B4B9CA" />
                            </svg>

                        </div>
                    </div>


                </div>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4 ">
                <a class="invisible underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <!-- ajout de l'attribut disabled -->
                <x-primary-button class="ms-4 boutons touche">
                    {{ __('CRÉER LE COMPTE') }}
                </x-primary-button>


            </div>
        </form>


    </div>

</x-guest-layout>
<x-footer :pageCourante="$pageCourante"></x-footer>