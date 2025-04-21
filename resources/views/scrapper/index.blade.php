<h1>Vins SAQ</h1>
<ul>
    @foreach ($bouteilles as $bouteille)
    <li>
        <a href="{{ $bouteille['url'] }}" target="_blank">
            {{ $bouteille['nom'] }} — {{ $bouteille['prix'] }}
        </a>
        <img src="{{ $bouteille['img'] }}" alt="{{ $bouteille['nom'] }}">
    </li>
    @endforeach
</ul>