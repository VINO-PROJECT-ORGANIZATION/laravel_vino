<h1>Vins SAQ</h1>
<ul>
    @foreach ($codes_saq as $code)
    <li>{{ $code }}</li>
    @endforeach
    {{print_r($codes_saq);}}
</ul>