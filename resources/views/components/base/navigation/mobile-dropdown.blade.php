<div x-show="open" x-cloak class="absolute w-[calc(100%-2rem)] top-20 left-0 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 mx-4 shadow-md"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90">
    @auth
        <div class="w-full flex divide-y flex-col p-3">
            <div class="flex flex-row justify-start gap-4 py-3 px-2 text-sm text-gray-900 dark:text-white">
                <x-user.avatar class="size-16"/>
                <div>
                    <div>{{ auth()->user()->username }}</div>
                    <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <div class="w-full py-3 dark:text-gray-200 space-y-2">
                <x-base.navigation.mobile-link href="{{ route('dashboard') }}">
                    {{ __('Dashboard') }}
                </x-base.navigation.mobile-link>
                <x-base.navigation.mobile-link href="{{ route('settings') }}">
                    {{ __('Settings') }}
                </x-base.navigation.mobile-link>
            </div>
            <div class="py-3 w-full text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block rounded-md w-full px-4 text-start py-2 text-sm text-gray-700 dark:text-gray-200 hover:text-red-700 hover:font-semibold hover:bg-red-200 dark:hover:text-red-100 dark:hover:bg-red-600">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>

            <div class="pt-3">
                <livewire:language-switcher />
            </div>
        </div>
    @else
        <div class="flex flex-col items-center gap-4 font-medium p-3">
            <x-base.navigation.mobile-link href="{{ route('quizzes') }}" class="text-center py-2">
                {{  __('Quizzes') }}
            </x-base.navigation.mobile-link>
            <x-base.navigation.mobile-link href="{{ route('wikis') }}" class="text-center py-2">
                {{  __('Wikis') }}
            </x-base.navigation.mobile-link>
            <x-button href="{{ route('login') }}" variant="secondary">
                {{  __('Login') }}
            </x-button>
            <x-button href="{{ route('register') }}">
                {{  __('Register') }}
            </x-button>
            <livewire:language-switcher />
        </div>
    @endauth
</div>
