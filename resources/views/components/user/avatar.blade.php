<img
    src="{{ auth()->user()->avatar }}"
    alt="Profile Picture"
    {{ $attributes->merge(['class' => "cursor-pointer rounded-full h-10 w-10"]) }}
/>
