<x-header-nav-sec />
<main>
    <section class="enregistrement-form">
        <header>
            <h1>Création de compte</h1>
        </header>
        <div class="enregistrement-form__container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nom -->
                <div class="groupe-input">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="name" value="{{ $user['name'] }}" required>
                    <x-input-error :messages="$errors->get('name')" />
                </div>
                <div class="groupe-input">
                    <!-- Prénom -->
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="{{ $user['prenom'] }}" required>
                    <x-input-error :messages="$errors->get('prenom')" />
                </div>
                <!-- Date de naissance -->
                <div class="groupe-input">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" value="{{ $user['date_naissance'] }}"
                        required>
                    <x-input-error :messages="$errors->get('date_naissance')" />
                </div>


    </section>
</main>
<x-footer :pageCourante="$pageCourante" />