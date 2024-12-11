<x-slot:max-width>max-w-2xl lg:max-w-3xl</x-slot>
<div class="flex flex-col items-center gap-4">
    <div class="flex justify-center mb-4">
        <div class="bg-primary-100 p-4 rounded-full">
            <x-heroicon-o-envelope class="w-8 h-8 text-primary-600"/>
        </div>
    </div>
    <h2 class="text-2xl font-semibold text-primary-900">Verify your email</h2>
    <p class="text-gray-600 mt-2">
        We've sent a verification link to your email address. Please click the link to verify your account and to get access to your dashboard.
    </p>
    <x-button href="mailto:">
        Open email app
    </x-button>
    <p class="mt-4 text-gray-600 text-sm">
        Didn't receive the email? Check your spam folder or
        <span class="cursor-pointer text-primary-500 underline hover:text-primary-600" wire:click="resendEmail">click here to resend</span>.
    </p>
</div>
