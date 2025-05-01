<x-header-nav-sec></x-header-nav-sec>
@foreach ($bouteilles as $bouteille)
<x-carte-bouteille-saq :bouteille="$bouteille"></x-carte-bouteille-saq>
@endforeach
<x-footer></x-footer>