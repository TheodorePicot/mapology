<div class="hidden md:w-full md:flex flex-wrap items-center justify-between mx-auto p-4">
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
        <div class="flex items-center space-x-4" x-data="{ open: false }" @click.outside="open = false">
            <div class="relative flex items-center" @click="open = !open" data-dropdown-toggle="dropdownAvatar">
                <span class="sr-only">Open user menu</span>
                <img
                    src="{{ auth()->user()->avatar }}"
                    alt="Profile Picture"
                    class="cursor-pointer rounded-full h-10 w-10"
                />
            </div>
            <div x-show="open" class="absolute right-4 top-14 mt-2 w-48 bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg py-1" @click.away="open = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-90"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-90">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div>{{ auth()->user()->name }}</div>
                    <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                </div>
                <div class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Dashboard
                    </a>
                    <a href="{{ route('settings') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Settings
                    </a>
                </div>
                <div class="py-2 pb-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full px-4 text-start py-2 text-sm text-gray-700 hover:text-red-700 hover:bg-red-200">Logout</button>
                    </form>
                </div>
            </div>
        </div>
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
