@props(['href', 'target' => '_self', 'underline' => false, 'icon' => null])

@php
    $baseClasses = $icon
        ? 'text-primary-500 hover:text-primary-600 dark:text-primary-400 dark:hover:text-primary-300 flex items-center space-x-1'
        : 'text-primary-500 hover:text-primary-600 dark:text-primary-400 dark:hover:text-primary-300';
    $classes = $underline ? "$baseClasses underline" : $baseClasses;
@endphp

<a href="{{ $href }}"
   target="{{ $target }}"
    {{ $attributes->merge(['class' => "$classes"]) }}>
    {{ $slot }}
    @if ($icon)
        <x-dynamic-component :component="$icon" class="size-4 ml-1" />
    @endif
</a>
