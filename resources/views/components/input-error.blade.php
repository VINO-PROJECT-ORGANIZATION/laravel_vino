@props(['messages'])

@if ($messages)
<ul {{ $attributes->merge(['class' => 'boiteAlerte error']) }}>
    @foreach ((array) $messages as $message)
    <p>{{ $message }}</p>
    @endforeach
</ul>
@endif