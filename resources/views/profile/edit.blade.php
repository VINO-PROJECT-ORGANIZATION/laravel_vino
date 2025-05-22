<x-header-nav-sec :pageCourante="$pageCourante" />
<main>
    @include('profile.partials.update-profile-information-form')
</main>
<x-footer :pageCourante="$pageCourante"></x-footer>