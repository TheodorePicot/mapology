<x-slot:max-width>max-w-2xl lg:max-w-3xl</x-slot>
<div>
    <x-icon.logo class="size-20 text-primary-500"/>
    <h1 class="mt-6 text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">
        Welcome to Mapology 🌍
    </h1>

    <p class="mt-4 leading-relaxed text-gray-500">
        Explore the world of maps and geography with our interactive quizzes and educational content.
        Start your journey today and discover the wonders of our planet!
    </p>

    <form action="#" class="flex flex-col w-full my-2 gap-3">
        <div class="flex flex-col gap-3 sm:flex-row w-full">
            <x-form.input id="first-name"
                          type="text"
                          name="first-name"
                          label="First Name"/>

            <x-form.input id="last-name"
                          type="text"
                          name="last-name"
                          label="Last Name"/>
        </div>

        <x-form.input id="email"
                      type="text"
                      name="email"
                      label="Email"
                      required/>

        <x-form.password id="password"
                         name="password"
                         label="Password"
                         required/>

        <x-form.password id="password-confirmation"
                         name="password-confirmation"
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
                <x-button class="flex-1">
                    Create an account
                </x-button>

                <p class="text-sm flex-1 text-primary-800 dark:text-gray-200">
                    Already have an account?
                    <x-text-link :href="route('login')" class="font-medium">Log in</x-text-link>
                </p>
            </div>
        </div>
    </form>
</div>
