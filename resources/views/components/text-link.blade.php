@props(['href', 'target' => '_self', 'underline' => false])
@php
    $baseClasses = 'text-primary-500 hover:text-primary-600 dark:text-primary-400 dark:hover:text-primary-300';
    $classes = $underline ? "$baseClasses underline" : $baseClasses;
@endphp

<a href="{{ $href }}"
   target="{{ $target }}"
    {{ $attributes->merge(['class' => "$classes"]) }}>
    {{ $slot }}
</a>
