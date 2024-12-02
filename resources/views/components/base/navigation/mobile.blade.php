<div x-data="{ open: false }" class="flex flex-wrap items-center justify-between mx-auto p-4 md:hidden">
    <a href="{{ route('home') }}" class="flex items-center space-x-3 ">
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-primary dark:text-white">Mapology</span>
    </a>
    <div x-show="open" class="block flex w-full ">
        <div class="flex items-center space-x-4 font-medium">
            <a href="#" class="py-2 px-3 text-gray-900 hover:text-primary dark:hover:text-gray-200 dark:text-white">
                Quizzes
            </a>
            <a href="#" class="py-2 px-3 text-gray-900 hover:text-primary dark:hover:text-gray-200 dark:text-white">
                Learn
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <x-button href="{{ route('login') }}" variant="secondary">
                Login
            </x-button>
            <x-button href="{{ route('register') }}">
                Register
            </x-button>
        </div>
    </div>
    <button type="button"
            class="p-2 w-10 h-10 flex items-center justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            @click="open = !open"
            aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only hidden">Open main menu</span>
        <x-heroicon-s-bars-3 class="size-7"/>
    </button>
</div>
