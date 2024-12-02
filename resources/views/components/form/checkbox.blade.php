@props(['id', 'name', 'label', 'checked' => false, 'disabled' => false])

<div class="flex cursor-pointer items-center gap-2">
    <input
           id="{{ $id }}"
           name="{{ $name }}"
           type="checkbox"
           {{ $attributes->merge(['class' => 'h-4 w-4 rounded border-primary-300 text-primary-700 focus:ring-primary-700 focus:ring-offset-0']) }}
           @checked($checked)
           @disabled($disabled)
    >
    <label for="{{ $id }}" class="ml-2 block text-sm font-medium text-primary-800 dark:text-gray-300">
        {{ $label }}
    </label>
</div>
