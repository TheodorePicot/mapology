<div class="max-w-xl lg:max-w-3xl space-y-8 rounded-lg shadow-md mx-2 bg-white dark:bg-gray-900 p-6 md:p-12 sm:p-20">
    <div class="flex flex-col items-center">
        <x-icon.logo class="size-20 text-primary-500"/>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-primary-900 dark:text-white">Forgot password</h2>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true">
        <div class="flex flex-col gap-4 ">
            <x-form.input id="email" type="email" name="email" label="Email address" placeholder="john@example.com" />
        </div>

        <x-button>
            Send password reset link
        </x-button>
    </form>
</div>
