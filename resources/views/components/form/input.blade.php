@props(['id', 'label' => null, 'type' => 'text', 'placeholder' => null, 'value' => null, 'error' => null])

<div class="flex flex-col gap-2">
    <label for="{{ $id }}" class="text-sm font-medium text-primary-800" {{ $label ? '' : 'hidden' }}>
        {{ $label }}
        @if ($attributes->get('required'))
            <span class="text-red-600">*</span>
        @endif
    </label>
    <div>
        <input {{ $attributes->merge(['class' => 'appearance-none block text-gray-900 shadow-md w-full sm:text-sm block w-full px-3 py-2 border border-primary-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 placeholder:text-gary-400']) }}
               type="{{ $type }}"
               placeholder="{{ $placeholder }}"
               value="{{ $value }}"
               {{ $error ? 'aria-invalid="true" aria-describedby="' . $error->id . '-error"' : '' }}
        />
        @if ($error)
            <p class="mt-2 text-sm text-red-600" id="{{ $error->id . '-error' }}">{{ $error }}</p>
        @endif
    </div>
</div>
