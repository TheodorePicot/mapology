<x-slot:max-width>max-w-xl lg:max-w-2xl</x-slot>
<div class="space-y-6">
    <div class="flex flex-col items-center">
        <h2 class="text-center text-2xl md:text-3xl font-extrabold text-primary-900 dark:text-white">Reset your password</h2>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true">
        <div class="flex flex-col gap-4">
            <x-form.input id="email"
                          type="email"
                          name="email"
                          label="Email address"
                          wire:model="email"
                          placeholder="john@example.com"/>

            <x-form.password name="password"
                             label="Password"
                             id="password"
                             wire:model="password"/>

            <x-form.password name="password_confirmation"
                             id="password_confirmation"
                             label="Password Confirmation"
                             wire:model="password_confirmation"/>
        </div>

        <x-button wire:click="resetPassword" wire-target="resetPassword" icon-left="heroicon-o-key" class="mt-4">
            Reset password
        </x-button>
    </form>
</div>
