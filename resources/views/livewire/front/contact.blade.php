<x-slot:max-width>max-w-xl lg:max-w-2xl</x-slot>
<section class="bg-white dark:bg-gray-900">
    <div class="container">
        <div class="mb-6">
            <h1 class="mt-2 text-2xl font-semibold text-primary-800 md:text-3xl dark:text-white">Contact us</h1>

            <p class="mt-3 text-gray-500 dark:text-gray-400">We’d love to hear from you. Please fill out this form or
                shoot us an email.</p>
        </div>

        <form>
            <div class="-mx-2 md:items-center md:flex">
                <div class="flex-1 px-2">
                    <x-form.input
                        id="first-name"
                        placeholder="John"
                        required
                        wire:model="first_name"
                        name="first_name"
                        label="First Name"/>
                </div>

                <div class="flex-1 px-2 mt-4 md:mt-0">
                    <x-form.input
                        id="last-name"
                        name="last_name"
                        wire:model="last_name"
                        required
                        placeholder="Doe"
                        label="Last Name"/>
                </div>
            </div>

            <div class="mt-4">
                <x-form.input
                    id="email"
                    type="email"
                    wire:model="email"
                    required
                    name="email"
                    placeholder="johndoe@example.com"
                    label="Email address"/>
            </div>

            <div class="w-full mt-4">
                <x-form.textarea
                    id="message"
                    name="message"
                    label="Message"
                    wire:model="message"
                    required
                    placeholder="Message"
                    label="Message"
                    rows="4"/>
            </div>

            <x-button wire-target="submit" class="mt-4" wire:click="submit">Send message</x-button>
        </form>

        <div class="flex flex-col lg:flex-row gap-4 mt-8">
            <x-front.contact.info-block  icon="heroicon-o-envelope" title="Email" description="Send us an email:" content="contact@mapology.eu"/>
            <x-front.contact.info-block icon="heroicon-o-map-pin" title="Address" description="Visit us at:" content="1234 Street Name, City, Country"/>
            <x-front.contact.info-block icon="heroicon-o-phone" title="Phone" description="Give us a call:" content="+123 456 7890"/>
        </div>
    </div>
</section>
