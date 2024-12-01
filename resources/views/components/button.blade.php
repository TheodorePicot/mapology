@props(['type' => 'button', 'variant' => 'primary', 'href' => null, 'iconLeft' => null, 'iconRight' => null])

@php
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium';
    $variantClasses = match($variant) {
        'secondary' => 'text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-gray-500 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600',
        default => 'text-white bg-primary hover:bg-primary-700 focus:ring-primary-500 dark:bg-primary-900 dark:hover:bg-primary-800',
    };
    $classes = "$baseClasses $variantClasses";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($iconLeft)
            <span class="mr-2">{{ $iconLeft }}</span>
        @endif
        {{ $slot }}
        @if($iconRight)
            <span class="ml-2">{{ $iconRight }}</span>
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($iconLeft)
            <span class="mr-2">{{ $iconLeft }}</span>
        @endif
        {{ $slot }}
        @if($iconRight)
            <span class="ml-2">{{ $iconRight }}</span>
        @endif
    </button>
@endif
