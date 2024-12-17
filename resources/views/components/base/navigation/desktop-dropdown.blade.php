<div class="flex items-center space-x-4" x-data="{ open: false }" @click.outside="open = false">
    <div class="relative flex items-center" @click="open = !open" data-dropdown-toggle="dropdownAvatar">
        <span class="sr-only">Open user menu</span>
        <x-user.avatar />
    </div>
    <div x-show="open" x-cloak class="absolute right-4 top-14 mt-2 w-64 dark:bg-gray-800 dark:border-gray-700 dark:text-white bg-white border border-gray-200 divide-y divide-gray-100 dark:divide-gray-400 rounded-md shadow-lg py-1"
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div>{{ auth()->user()->username }}</div>
            <div class="font-medium truncate">{{ auth()->user()->email }}</div>
        </div>
        <div class="py-2 " aria-labelledby="dropdownUserAvatarButton">
            <x-base.navigation.desktop-link href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </x-base.navigation.desktop-link>
            <x-base.navigation.desktop-link href="{{ route('settings') }}">
                {{ __('Settings') }}
            </x-base.navigation.desktop-link>
        </div>
        <div class="py-2 pb-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block w-full px-4 text-start py-2 text-sm text-gray-700 dark:text-gray-200 hover:text-red-700 hover:font-semibold hover:bg-red-200 dark:hover:text-red-100 dark:hover:bg-red-600">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>
</div>
