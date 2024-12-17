<x-slot:max-width>max-w-xl lg:max-w-2xl</x-slot>
<div class="space-y-8">
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/mapology-logo-only.webp') }}" alt="Mapology logo - login" class="h-16">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-primary-900 dark:text-white">
            {{ __('Sign in to your account') }}
        </h2>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true">
        <div class="flex flex-col gap-4 ">
            <x-form.input id="email"
                          type="email"
                          autocomplete="email"
                          name="email"
                          label="Email address"
                          placeholder="john@example.com"
                          wire:model.live="email"/>

            <x-form.password id="password"
                             name="password"
                             label="Password"
                             wire:model="password"/>
        </div>

        <div class="flex items-center justify-between">
            <x-form.checkbox label="Remember me"
                             id="remember"
                             name="remember"
                             wire:model="remember"/>

            <div class="text-sm">
                <a href="{{ route('forgot-password') . ( $this->email ? '?email=' . urlencode($email) : '' ) }}"
                   class="font-medium text-primary-500 hover:text-primary-600 dark:text-primary-400 dark:hover:text-primary-300"
                >
                    {{ __('Forgot password?') }}
                </a>
            </div>
        </div>

        <x-button wire:click="authenticate" wire-target="authenticate">
            {{ __('Sign in') }}
        </x-button>
    </form>

    <x-form.separator message="Or continue with"/>

    <div class="flex flex-col md:flex-row  md:items-center w-full gap-4">
        <div class="w-full md:flex-1" x-data="{clicked: false}">
            <x-button href="{{ route('redirect.provider',  [App\Enums\OauthProvider::Github, $this->oauthAction]) }}" variant="primary-outline" @click="clicked=true">
                <div x-show="!clicked">
                    <x-icon.social.github class="size-5 mr-3" />
                </div>
                <x-icon.spinner x-show="clicked" x-cloak class="size-5 mr-3 text-primary-900 dark:text-white" />
                <span :class="clicked ? 'opacity-50 dark:opacity-70' : 'opacity-100'" >
                    {{ __('Continue with GitHub') }}
                </span>
            </x-button>
        </div>
        <div class="w-full md:flex-1" x-data="{clicked: false}">
            <x-button href="{{ route('redirect.provider',  [App\Enums\OauthProvider::Google, $this->oauthAction]) }}" variant="primary-outline" @click="clicked=true">
                <div x-show="!clicked">
                    <x-icon.social.google class="size-5 mr-3" />
                </div>
                <x-icon.spinner x-show="clicked" x-cloak class="size-5 mr-3 text-primary-900 dark:text-white" />
                <span :class="clicked ? 'opacity-50 dark:opacity-70' : 'opacity-100'">
                    {{ __('Continue with Google') }}
                </span>
            </x-button>
        </div>
    </div>

    <div class="flex gap-1 items-center w-full justify-center text-sm text-gray-500">
        <div>
            {{ __("Don't have an account?") }}
        </div>
        <x-text-link
            :href="route('register')"
            icon="heroicon-o-arrow-top-right-on-square"
            class="font-medium">
            {{ __('Register now') }}
        </x-text-link>
    </div>
</div>
