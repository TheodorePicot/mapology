<x-slot:max-width>max-w-xl lg:max-w-2xl</x-slot>
<div class="space-y-8">
    <div class="flex flex-col items-center">
        <x-icon.logo class="size-16 text-primary-500"/>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-primary-900 dark:text-white">
            Sign in to your account
        </h2>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true">
        <div class="flex flex-col gap-4 ">
            <x-form.input id="email"
                          type="email"
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
                    Forgot password?
                </a>
            </div>
        </div>

        <x-button wire:click="authenticate">
            Sign in
        </x-button>
    </form>

    <div class="relative">
        <div class="absolute inset-0 flex items-center dark:border-gray-600" aria-hidden="true">
            <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
        </div>
        <div class="relative flex justify-center">
        <span class="px-2 bg-white dark:bg-gray-900 text-sm text-gray-500 dark:text-gray-400">
            Or continue with
        </span>
        </div>
    </div>

    <div class="flex items-center w-full space-x-4">
        <x-button variant="secondary" href="#" icon-left="icon.social.google">
            Google
        </x-button>
        <x-button variant="secondary" href="#" icon-left="icon.social.github">
            GitHub
        </x-button>
    </div>

    <div class="text-center text-sm text-gray-500">
        Don't have an account?
        <x-text-link
            :href="route('register')"
            class="font-medium">
            Register
        </x-text-link>
    </div>
</div>
