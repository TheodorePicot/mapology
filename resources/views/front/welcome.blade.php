<x-layouts.front.base>
    <div class="container mx-auto py-8">
        <div class="absolute left-0 top-0 w-1/3 h-screen" id="confetti-left"></div>
        <div class="absolute right-0 top-0 w-1/3 h-screen" id="confetti-right"></div>
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
        <script>
            confetti.create(document.getElementById('confetti-left'), { fade: true, resize: true, gravity: 0.5 });
            confetti.create(document.getElementById('confetti-right'), { fade: true, resize: true, gravity: 0.5 });
            confetti.left.start();
            confetti.right.start();
        </script>
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
</x-layouts.front.base>
