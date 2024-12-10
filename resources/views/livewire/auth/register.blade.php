<x-slot:max-width>max-w-2xl lg:max-w-3xl</x-slot>
<div>
    <x-icon.logo class="size-20 text-primary-500"/>
    <h1 class="mt-6 text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">
        Welcome to Mapology 🌍
    </h1>

    <div class="flex flex-col lg:flex-row gap-4 mt-6">
        <x-button class="flex-1" href="{{ route('redirect.provider',  [App\Enums\OauthProvider::Github, $this->oauthAction]) }}" variant="primary-outline" icon-left="icon.social.github">
            Continue with GitHub
        </x-button>

        <x-button class="flex-1" href="{{ route('redirect.provider',  [App\Enums\OauthProvider::Google, $this->oauthAction]) }}" variant="primary-outline" icon-left="icon.social.google">
            Continue with Google
        </x-button>
    </div>

    <div class="my-6">
        <x-form.separator message="Or"/>
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
                          name="username"
                          label="Display name"
                          required
            />
            <x-form.input id="email"
                          type="email"
                          name="email"
                          placeholder="john@example.com"
                          wire:model="email"
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
                             label="Password Confirmation"
                             required/>

            <div class="flex flex-col gap-4 mt-2">
                <x-form.checkbox id="marketing"
                                 name="marketing"
                                 label="I want to receive emails about events, feature updates and mapology announcements."/>

                <p class="text-sm text-gray-500">
                    By creating an account, you agree to our
                    <x-text-link :href="route('terms-and-conditions')" underline>terms and conditions</x-text-link>
                    and
                    <x-text-link :href="route('privacy-policy')" underline>privacy policy</x-text-link>
                </p>

                <div class="flex gap-4 items-center">
                    <x-button class="flex-1" wire:click="submit">
                        <span wire:loading.class="opacity-50" wire:target="submit">
                            Create an account
                        </span>

                        <x-icon.spinner wire:loading.flex wire:target="submit" class="size-5 ml-2 text-white" />
                    </x-button>

                    <p class="text-sm flex-1 text-primary-800 dark:text-gray-200">
                        Already have an account?
                        <x-text-link :href="route('login')" class="font-medium">Log in</x-text-link>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
