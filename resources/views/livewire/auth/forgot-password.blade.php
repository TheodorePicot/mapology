<x-slot:max-width>max-w-xl</x-slot>
<div class="space-y-6">
    <div class="flex flex-col items-center">
        <h2 class="text-center text-2xl md:text-3xl font-extrabold text-primary-900 dark:text-white">
            Forgot your password?
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
            Enter your email address below and we'll send you a link to reset your password.
        </p>
    </div>

    <form class="mt-8 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true">
        <div class="flex flex-col gap-4 ">
            <x-form.input id="email"
                          type="email"
                          name="email"
                          label="Email address"
                          wire:model="email"
                          placeholder="john@example.com"/>
        </div>



        <x-button wire:click="submitForgotPasswordRequest" wire-target="submitForgotPasswordRequest" icon-left="heroicon-o-key">
            Send password reset link
        </x-button>
    </form>

    @if($this->submitted)
        <div class="mt-2 text-center text-sm justify-center flex space-x-2 text-gray-600 dark:text-gray-400">
            <div>
                Didn't receive the email?
            </div>
            <x-text-link href="javascript:void(0)" wire:click="resendEmail" class="font-medium" icon="heroicon-o-arrow-top-right-on-square">
                Resend it now
            </x-text-link>
        </div>
    @endif
</div>
