<div class="hidden lg:w-full lg:flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="flex items-center space-x-12">
        <a href="{{ route('home') }}" class="flex items-center space-x-1 rtl:space-x-reverse text-primary-500">
            <x-icon.logo class="size-10" />
            <span
                class="self-center text-xl font-semibold whitespace-nowrap  dark:text-white">Mapology</span>
        </a>
        <div class="flex items-center space-x-4 font-medium">
            <a href="#" class="py-2 px-3 text-gray-900 hover:text-primary-800 dark:hover:text-gray-200 dark:text-white">
                Quizzes
            </a>
            <a href="#" class="py-2 px-3 text-gray-900 hover:text-primary-800 dark:hover:text-gray-200 dark:text-white">
                Learn
            </a>
        </div>
    </div>
    @auth
        <x-base.navigation.desktop-dropdown />
    @else
        <div class="flex items-center space-x-4" >
            <x-button href="{{ route('login') }}" variant="secondary">
                Login
            </x-button>
            <x-button href="{{ route('register') }}">
                Register
            </x-button>
        </div>
    @endauth
</div>
