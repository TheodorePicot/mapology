<x-layouts.front.base>
    <div class="flex justify-center items-center min-h-app-height bg-primary-100 dark:bg-gray-800">
        <div class="w-full {{ $maxWidth }}  rounded-lg shadow-md mx-2 bg-white dark:bg-gray-900 p-6 md:p-12 my-10">
            {{ $slot }}
        </div>
    </div>
</x-layouts.front.base>
