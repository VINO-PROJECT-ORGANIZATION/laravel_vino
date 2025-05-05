<x-header-nav-sec></x-header-nav-sec>
<main>
    @foreach ($bouteilles as $bouteille)
    <x-carte-bouteille-saq :bouteille="$bouteille"></x-carte-bouteille-saq>
    @endforeach

    <div class="pagination">
        {{ $bouteilles->links('pagination::default') }}
    </div>
</main>
<x-footer :pageCourante="$pageCourante"></x-footer>