<x-slot:max-width>max-w-2xl lg:max-w-3xl</x-slot>
<div>
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/mapology-logo-only.webp') }}" alt="Mapology logo - login" class="h-16">
        <h1 class="mt-6 text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">
            {{ __('Welcome to Mapology') }}🌍
        </h1>
    </div>

    <div class="flex flex-col lg:flex-row gap-4 mt-12">
        <div class="flex-1" x-data="{clicked: false}">
            <x-button href="{{ route('redirect.provider',  [App\Enums\OauthProvider::Github, $this->oauthAction]) }}" variant="primary-outline" @click="clicked=true">
                <div x-show="!clicked">
                    <x-icon.social.github class="size-5 mr-3" />
                </div>
                <x-icon.spinner x-show="clicked" x-cloak class="size-5 mr-3 text-primary-900 dark:text-white"/>
                <span :class="clicked ? 'opacity-50 dark:opacity-70' : 'opacity-100'" >
                    {{ __('Continue with GitHub') }}
                </span>
            </x-button>
        </div>
        <div class="flex-1" x-data="{clicked: false}">
            <x-button href="{{ route('redirect.provider',  [App\Enums\OauthProvider::Google, $this->oauthAction]) }}" variant="primary-outline" @click="clicked=true">
                <div x-show="!clicked">
                    <x-icon.social.google class="size-5 mr-3" />
                </div>
                <x-icon.spinner x-show="clicked" x-cloak class="size-5 mr-3 text-primary-900 dark:text-white"/>
                <span :class="clicked ? 'opacity-50 dark:opacity-70' : 'opacity-100'">
                    {{ __('Continue with Google') }}
                </span>
            </x-button>
        </div>
    </div>

    <div class="my-6">
        <x-form.separator message="or"/>
    </div>

    <form action="#" class="flex flex-col w-full my-2 gap-3">
        <div class="flex-row sm:flex gap-6 items-center justify-center">
            <div class="my-3 sm:my-0 sm:mx-10 text-center">
                <div class="my-2 text-sm font-medium text-primary-800 dark:text-gray-200">Avatar</div>
                <x-form.avatar />
            </div>
        </div>

        <div class="flex flex-col gap-4 mt-2">
            <x-form.input id="username"
                          type="text"
                          wire:model="username"
                          placeholder="geography_lover123"
                          autocomplete="username"
                          name="username"
                          label="Display name"
                          required
            />
            <x-form.input id="email"
                          type="email"
                          name="email"
                          placeholder="john@example.com"
                          wire:model="email"
                          autocomplete="email"
                          label="Email"
                          required/>

            <x-form.password id="password"
                             name="password"
                             wire:model="password"
                             label="Password"
                             required/>

            <x-form.password id="password-confirmation"
                             name="password_confirmation"
                             wire:model="password_confirmation"
                             label="Password confirmation"
                             required/>

            <div class="flex flex-col gap-4 mt-2">
                <p class="text-sm text-gray-500">
                    {{ __('By creating an account, you agree to our') }}
                    <x-text-link :href="route('terms-and-conditions')" underline>{{ __('terms and conditions') }}</x-text-link>
                    {{ __('and') }}
                    <x-text-link :href="route('privacy-policy')" underline>{{ __('privacy policy') }}</x-text-link>
                </p>

                <div class="flex gap-4 items-center">
                    <x-button class="flex-1" wire:click="submit" wire-target="submit">
                        {{  __('Create an account') }}
                    </x-button>

                    <p class="text-sm flex-1 text-primary-800 dark:text-gray-200">
                        {{ __('Already have an account?') }}

                        <x-text-link :href="route('login')" class="font-medium">{{ __('Log in') }}</x-text-link>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
