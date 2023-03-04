@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'btn btn-danger']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </ul>
@endif