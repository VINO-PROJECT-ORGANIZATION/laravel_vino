<x-header-nav-sec :pageCourante="$pageCourante" />
<main>
    <h1>Bouteilles par utilisateur</h1>
    @foreach ($bouteillesUtilisateur as $bouteilleUtilisateur)
    <div class="bouteille-utilisateur">
        <h2>hello</h2>
        <p>Quantité: {{ $bouteilleUtilisateur->quantite }}</p>
    </div>
    @endforeach

</main>
<x-footer :pageCourante="$pageCourante" />