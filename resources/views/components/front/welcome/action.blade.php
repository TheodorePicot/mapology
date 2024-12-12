<div class="p-4 pl-2 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-primary-400 dark:border-gray-700 flex-1 flex flex-col gap-2 min-h-60">
    <div class="flex flex-row gap-4 items-center pl-2">
        <div class="p-2 bg-{{ $iconColor }}-200 dark:bg-{{ $iconColor }}-800 rounded-full">
            <x-dynamic-component :component="$icon" class="size-6 text-{{ $iconColor }}-800 dark:text-{{ $iconColor }}-200" />
        </div>
        <h3 class="text-xl font-semibold text-primary-800 dark:text-gray-300">{{ $title }}</h3>
    </div>
    <div class="pl-3 flex-1 my-2">
        <p class="text-gray-600 dark:text-gray-300">{{ $text }}</p>
    </div>
    <x-button href="{{ route($routeName) }}" class="mr-2 ml-1" variant="secondary">
        {{ $actionText }}
    </x-button>
</div>
