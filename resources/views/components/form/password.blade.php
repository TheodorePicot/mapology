@props(['id', 'name', 'label' => null, 'value' => null, 'required' => false])

<div class="flex flex-col gap-2 flex-1" x-data="{ showPassword: false }">
    <label for="{{ $id }}" class="text-sm font-medium text-primary-800 dark:text-gray-200" {{ $label ? '' : 'hidden' }}>
        {{ $label }}
        @if ($required)
            <span class="text-primary-400">*</span>
        @endif
    </label>
    <div class="relative mb-3">
        <input
            x-ref="input"
            :type="showPassword ? 'text' : 'password'"
            id="{{ $id }}"
            name="{{ $name }}"
            placeholder="••••••••"
            autocomplete="new-password"
            @if ($errors->has($name))
                x-on:input="$refs.input.classList.remove('border-red-600')"
            @endif
            {{ $attributes->merge(['class' => 'appearance-none bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 shadow-md w-full sm:text-sm block px-3 py-2 border border-primary-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 placeholder:text-gray-400 dark:placeholder:text-gray-500' . ($errors->has($name) ? ' border-red-600' : '')]) }}
        />
        <button type="button" @click="showPassword = !showPassword" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-neutral-600 dark:text-neutral-300" aria-label="Show password">
            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
            </svg>
        </button>
        @error($name)
            <p class="absolute mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>
</div>
