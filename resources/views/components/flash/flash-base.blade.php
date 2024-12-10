@php
    $colorMatching = [
        'error' => 'red-600',
        'warning' => 'yellow-500',
        'success' => 'green-500',
        'info' => 'blue-500',
    ]
@endphp
@foreach (['error', 'warning', 'success', 'info'] as $type)
    @session($type)
        <div class="absolute top-4 right-4 z-50 lg:max-w-xl">
            <x-dynamic-component component="flash.{{ $type }}" value="{{ $value }}" />
        </div>
    @endsession
@endforeach
