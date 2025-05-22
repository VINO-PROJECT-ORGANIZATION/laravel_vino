<x-header-nav-sec :pageCourante="$pageCourante" />
<main>
    <!-- si un utilisateur est conecter -->
    <h1>Bonjour @if ($user){{ $user["prenom"] }}@endif!</h1>

    <x-slider-cellier :celliers="$celliers" :quantiteBouteilles="$quantiteBouteilles" />

</main>
<x-footer :pageCourante="$pageCourante" />