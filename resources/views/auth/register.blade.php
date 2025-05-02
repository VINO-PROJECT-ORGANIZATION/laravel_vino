<x-guest-layout>
    <div class="balise_form balise">

    <form method="POST" action="{{ route('register') }}">
        @csrf


        <!-- Email Address -->
        <div class="mt-4">
            <div class="contenant">
            <x-input-label for="email" :value="__('COURRIEL')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Name -->
        <div>
            <div class="contenant">
            <x-input-label for="name" :value="__('NOM')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

         <!-- Prenom -->
         <div>
            <div class="contenant">
            <x-input-label for="prenom" :value="__('PRENOM')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
            </div>
            
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>


         <!-- Date de Naissance -->
         <div>
            <div class="contenant">
            <x-input-label for="date_naissance" :value="__('DATE DE NAISSANCE')" />
            <x-text-input id="date_naissance" class="block mt-1 w-full" type="date" name="date_naissance" :value="old('date_naissance')" required autofocus autocomplete="date_naissance" />
            </div>
            
            <x-input-error :messages="$errors->get('date_naissance')" class="mt-2" />
        </div>


         <!-- Addresse -->
         <div>
            <div class="contenant">
            <x-input-label for="addresse" :value="__('ADDRESSE')" />
            <x-text-input id="addresse" class="block mt-1 w-full" type="text" name="addresse" :value="old('addresse')" required autofocus autocomplete="addresse"  />
            </div>
            
            <x-input-error :messages="$errors->get('addresse')" class="mt-2" />
        </div>

        
        <!-- Password -->
        <div class="mt-4">
            <div class="contenant">
            <x-input-label for="password" :value="__('MOT DE PASSE')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            </div>
            
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <div class="contenant">
            <x-input-label for="password_confirmation" :value="__('RÉPÉTER LE MOT DE PASSE')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            </div>
            
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 ">
            <a class="invisible underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            
            <x-primary-button class="ms-4 boutons touche">
                {{ __('CRÉER LE COMPTE') }}
            </x-primary-button>
          
            
        </div>
    </form>


    </div>
    
</x-guest-layout>
