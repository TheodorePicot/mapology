<x-layouts.layout>
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold text-center text-primary-700 mb-4">Welcome to Mapology</h1>
        <p class="text-lg text-center text-gray-600">
            Explore the world of maps and geography with our interactive quizzes and educational content. Start your journey today and discover the wonders of our planet!
        </p>
        <div class="flex justify-center mt-6">
            <x-button href="{{ route('quizzes') }}" class="mx-2">
                Explore Quizzes
            </x-button>
            <x-button href="{{ route('learn') }}" variant="secondary" class="mx-2">
                Learn More
            </x-button>
        </div>
    </div>
</x-layouts.layout>
