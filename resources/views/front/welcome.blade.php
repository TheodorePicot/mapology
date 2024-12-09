<x-layouts.front.base>
    <div class="container mx-auto py-8">

        <h1 class="text-4xl font-bold text-center text-primary-700 mb-4">
            Hello, {{ auth()->user()->name }}!
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

    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const confettiSettings = { target: 'my-canvas' };
            const confetti = new ConfettiGenerator(confettiSettings);
            confetti.render();
        });
    </script>
    <canvas id="my-canvas" class="w-full h-full fixed top-0 left-0 pointer-events-none"></canvas>
</x-layouts.front.base>
