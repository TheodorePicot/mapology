<div class="flex justify-center items-center h-app-height">
    <div class="w-full max-w-xl space-y-8 rounded-lg shadow-md mx-2 bg-white p-6 md:p-12 sm:p-20">
        <div class="flex flex-col items-center">
            <x-icon.logo class="size-16"/>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-primary-900">Sign in to your account</h2>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="flex flex-col gap-4 ">
                <x-form.input type="email" name="email" label="Email address" placeholder="john@example.com" />
                <x-form.password name="password" label="Password" />
            </div>

            <div class="flex items-center justify-between">
                <x-form.checkbox label="Remember me" id="remember" name="remember" />

                <div class="text-sm">
                    <a href="#" class="font-medium text-primary-500 hover:text-primary-600">Forgot password?</a>
                </div>
            </div>

            <x-button>
                Sign in
            </x-button>
        </form>

        <div class="relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-2 bg-white text-sm text-gray-500">
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
            Don't have an account? <a href="#" class="font-medium text-primary-500 hover:text-primary-600">Create one here</a>
        </div>
    </div>
</div>
