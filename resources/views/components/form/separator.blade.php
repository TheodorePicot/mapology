@props(['message' => null])
<div class="relative">
    <div class="absolute inset-0 flex items-center dark:border-gray-600" aria-hidden="true">
        <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
    </div>
    @if($message)
        <div class="relative flex justify-center">
            <span class="px-2 bg-white dark:bg-gray-900 text-sm text-gray-500 dark:text-gray-400">
                {{ $message }}
            </span>
        </div>
    @endif
</div>
