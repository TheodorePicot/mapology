<x-layouts.front.auth>
    <x-slot:max-width>max-w-2xl lg:max-w-4xl</x-slot>
    <div class="container mx-auto py-2 dark:bg-gray-900">
        <div class="p-4 bg-green-100 dark:bg-green-900 rounded-full w-fit mx-auto mb-4">
            <x-icon.user-check class="size-8 text-green-500 dark:text-green-300"/>
        </div>
        <h1 class="text-3xl font-bold text-center text-primary-700 dark:text-primary-300 mb-4">
            Hey {{ auth()->user()->username }}, welcome to Mapology!
        </h1>
        <p class="text-lg text-center text-gray-600 dark:text-gray-400">
            Your account has been created successfully. Let's get you started!
        </p>
        <div class="flex flex-col gap-6 mt-6">
            <div class="flex flex-col md:flex-row gap-6 grow h-full">
                <x-front.welcome.action
                    icon="heroicon-o-check-badge"
                    icon-color="blue"
                    title="Official Content"
                    text="Start with our curated geography quizzes and flag challenges. Learn from our comprehensive vexillology and maps wikis."
                    route-name="quizzes"
                    action-text="Start exploring our official content"
                />
                <x-front.welcome.action
                    icon="heroicon-o-user-group"
                    icon-color="violet"
                    title="Learn with our Wikis"
                    text="Explore community-created quizzes, contribute to wikis, and share your knowledge with fellow learners."
                    route-name="quizzes"
                    action-text="Start exploring the community driven content"
                />
            </div>
            <div class="flex flex-col md:flex-row gap-6 flex-1 h-full">
                <x-front.welcome.action
                    icon="heroicon-o-book-open"
                    icon-color="fuchsia"
                    title="Create Quizzes & Wikis"
                    text="Create quizzes and wikis based on your knowledge and interests. Share them with the community and help others learn."
                    route-name="quizzes.create"
                    action-text="Start creating quizzes"
                />
                <x-front.welcome.action
                    icon="heroicon-o-puzzle-piece"
                    icon-color="teal"
                    title="Contribute to Official Quizzes"
                    text="Help us improve our official quizzes by contributing your knowledge. Work together with other community members to create the best possible learning experience."
                    route-name="become-contributor"
                    action-text="Become a contributor"
                />
            </div>
        </div>
        <div class="flex justify-center mt-6">
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                Want to manage your profile? <x-text-link :href="route('settings')" class="font-medium">Visit your profile</x-text-link>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const duration = 5 * 1000;
            const animationEnd = Date.now() + duration;
            const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            const interval = setInterval(function() {
                const timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                const particleCount = 50 * (timeLeft / duration);
                confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
                confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
            }, 250);
        });
    </script>
</x-layouts.front.auth>
