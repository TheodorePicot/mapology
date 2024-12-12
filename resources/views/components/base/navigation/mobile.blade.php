<div x-data="{ open: false }" class="flex flex-wrap items-center justify-between mx-auto p-4 lg:hidden">
    <a href="{{ route('home') }}" class="flex items-center space-x-3 ">
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-primary dark:text-white">Mapology</span>
    </a>
    <button class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false" @click="open = !open">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <x-base.navigation.mobile-dropdown />
</div>
