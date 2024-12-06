@props(['id', 'name', 'label' => null, 'type' => 'text', 'placeholder' => null, 'value' => null, 'required' => false])

<div class="flex flex-col gap-2 flex-1" x-data>
    <label for="{{ $id }}" class="text-sm font-medium text-primary-800 dark:text-gray-200" {{ $label ? '' : 'hidden' }}>
        {{ $label }}
        @if ($required)
            <span class="text-primary-400">*</span>
        @endif
    </label>
    <div class="relative mb-3">
        <input
            x-ref="input"
            {{ $attributes->merge(['class' => 'appearance-none bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 shadow-md w-full sm:text-sm block px-3 py-2 border border-primary-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 placeholder:text-gray-400 dark:placeholder:text-gray-500' . ($errors->has($name) ? ' border-red-600' : '')]) }}
                x-on:input="$refs.input.classList.remove('border-red-600');$refs.input.classList.add('border-primary-300 dark:border-gray-600')"
                type="{{ $type }}"
                name="{{ $name }}"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}"
        />
        @error($name)
            <p class="absolute mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>
</div>
