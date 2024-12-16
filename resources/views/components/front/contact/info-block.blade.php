<div class="p-4 rounded-lg bg-primary-50 md:p-6 dark:bg-gray-800 flex-1">
    <div>
        <span class="inline-block p-3 text-primary-500 rounded-lg bg-primary-100 dark:bg-primary-800">
            <x-dynamic-component :component="$icon" class="size-5" />
        </span>
    </div>

    <h2 class="mt-4 text-base font-medium text-gray-800 dark:text-white">{{ $title }}</h2>
    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $description }}</p>
    <p class="mt-2 text-sm text-primary-500 dark:text-primary-400">{{ $content }}</p>
</div>
