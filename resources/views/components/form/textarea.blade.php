@props([
    'name',
    'id',
    'label' => null,
    'placeholder' => null,
    'rows' => 3,
    'required' => false,
    'autocomplete' => null,
])

<div class="flex flex-col gap-2 relative mb-3">
    <label for="{{ $id }}" class="text-sm font-medium text-primary-800 dark:text-gray-300" {{ $label ? '' : 'hidden' }}>
        {{ $label }}
        @if ($required)
            <span class="text-primary-400">*</span>
        @endif
    </label>
    <textarea
        x-ref="input"
        {{ $attributes->merge(['class' => 'appearance-none bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 shadow-md w-full sm:text-sm block px-3 py-2 border border-primary-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 placeholder:text-gray-400 dark:placeholder:text-gray-500' . ($errors->has($name) ? ' border-red-600 dark:border-red-600' : '')]) }}
            @if ($errors->has($name))
                x-on:input="$refs.input.classList.remove('border-red-600'); $refs.input.classList.remove('dark:border-red-600')"
            @endif
            id="{{ $id }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            rows="{{ $rows }}"
            {{ $required ? 'required' : '' }}
            {{ $autocomplete ? 'autocomplete="' . $autocomplete . '"' : '' }}
    ></textarea>
    @error($name)
        <p class="absolute -bottom-5 mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>
