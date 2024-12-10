<x-layouts.front.base>
    <div class="container mx-auto py-8">

        <h1 class="text-4xl font-bold text-center text-primary-700 mb-4">
            Hello, {{ auth()->user()->username }}!
        </h1>
        <p class="text-lg text-center text-gray-600">
            Congratulations on creating your account! You are now ready to embark on an exciting journey exploring the world of maps and geography. Dive into our interactive quizzes and educational content to enhance your knowledge.
        </p>
        <div class="flex justify-center mt-6">
            <x-button href="{{ route('quizzes') }}" class="mx-2">
                Start Exploring Quizzes
            </x-button>
            <x-button href="{{ route('wikis') }}" variant="secondary" class="mx-2">
                Learn More
            </x-button>
        </div>
        <div class="flex justify-center mt-6">
            <p class="text-center text-sm text-gray-500">
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
</x-layouts.front.base>
