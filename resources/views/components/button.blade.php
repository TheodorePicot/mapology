@props(['type' => 'button', 'variant' => 'primary', 'href' => null, 'iconLeft' => null, 'iconRight' => null, 'iconType' => null, 'width' => 'w-full'])

@php
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2 border rounded-md shadow-sm text-sm font-medium';
    $variantClasses = match($variant) {
        'primary-outline' => 'text-primary-800 border border-primary-500 bg-white hover:bg-gray-100 focus:ring-primary-500 dark:border-primary-400 dark:text-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700',
        'secondary' => 'text-gray-700 border-transparent bg-primary-100 hover:bg-primary-200 focus:ring-gray-500 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600',
        default => 'text-white bg-primary-600 border-transparent hover:bg-primary-700 focus:ring-primary-500 dark:bg-primary-900 dark:hover:bg-primary-800',
    };
    $classes = "$baseClasses $variantClasses";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$classes $width"]) }}>
        @if($iconLeft)
            <x-dynamic-component :component="$iconLeft" class="size-5 mr-2"/>
        @endif
        {{ $slot }}
        @if($iconRight)
            <x-dynamic-component :component="$iconRight" class="size-5"/>
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "$classes $width"]) }}>
        @if($iconLeft)
            <x-dynamic-component :component="$iconLeft" class="size-5 mr-2"/>
        @endif
        {{ $slot }}
        @if($iconRight)
            <x-dynamic-component :component="$iconRight" class="size-5"/>
        @endif
    </button>
@endif
