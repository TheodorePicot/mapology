<div id="alert-border-1"
     class="flex items-center p-4 mb-4 min-w-64 rounded-lg border-t-4 border-blue-500 bg-blue-100 dark:bg-blue-800"
     role="alert" x-data="{ show: true }"
     x-init="setTimeout(() => show = false, 5000)"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90">
    <x-heroicon-o-information-circle class="size-5 min-w-5 min-h-5 text-blue-500"/>
    <div class="ms-3 text-sm font-medium px-1">
        {{ $value }}
    </div>
    <button color="button"
            class="ms-auto -mx-1.5 -my-1.5 min-w-8 rounded-lg focus:ring-2 focus:ring-blue-600 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-border-1" aria-label="Close"
            @click="show = false">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
