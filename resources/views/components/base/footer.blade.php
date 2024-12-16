<footer class="bg-gray-50 shadow dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ route('home') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <div class="space-x-2  dark:text-white flex items-center">
                    <img src="{{ asset('images/mapology-long.webp') }}" alt="Mapology logo" class="h-16">
                </div>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="{{ route('become-contributor') }}" class="hover:underline me-4 md:me-6">Become a contributor</a>
                </li>
                <li>
                    <a href="{{ route('privacy-policy') }}" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="{{ route('terms-and-conditions') }}" class="hover:underline me-4 md:me-6">Terms and conditions</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">
                Copyright &copy; 2024. All rights reserved.
        </span>
    </div>
</footer>

