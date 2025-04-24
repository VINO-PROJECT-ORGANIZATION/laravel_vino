<h1>Vins SAQ</h1>
<ul>
    @foreach ($codes_saq as $code)
    <li>{{ $code }}</li>
    @endforeach
    {{print_r($codes_saq);}}
</ul>

<h1>bouteilles</h1>
@foreach ($bouteilles as $bouteille)
<ul>
    <li>{{ $bouteille['nom'] }}</li>
    <li>{{ $bouteille['prix_saq'] }}</li>
    <li><img src="{{ $bouteille['url_image'] }}" alt="{{ $bouteille['nom'] }}"></li>
    <li>{{ $bouteille['pays']}}</li>
    <li>{{ $bouteille['format']}}</li>
    <li>{{ $bouteille['type']}}</li>
</ul>
@endforeach
{{print_r($bouteilles);}}