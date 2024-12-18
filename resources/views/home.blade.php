<x-layouts.front.base>
    @vite(['resources/css/globe.css', 'resources/js/globe.js'])
    <!-- Hero Section -->
    <section class="bg-primary-100 py-32">
        <div class="max-w-screen-2xl mx-auto flex flex-col items-center text-center lg:flex-row lg:text-left">
            <div class="lg:w-1/2">
                <h1 class="text-4xl font-bold mb-4">
                    {{ __('Master Geography Through Interactive Learning') }}
                </h1>
                <p class="text-lg mb-6">
                    {{ __('Create and explore quizzes about countries, flags, and geography. Learn while having fun and share your knowledge with others.') }}
                </p>
                <div class="flex space-x-4">
                    <x-button href="{{ route('quizzes') }}">
                        {{ __('Start Learning') }}
                    </x-button>
                    <x-button href="{{ route('quizzes.create') }}" variant="primary-outline">
                        {{ __('Create Quiz') }}
                    </x-button>
                </div>
            </div>
            <div class="lg:w-1/2 justify-center mt-8 lg:mt-0 hidden lg:flex">
                <!-- Replace with the flag icon -->
                <x-icon.globe-spinner/>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="max-w-screen-2xl p-8 mx-auto">
            <div class="text-center">
                <h2 class="text-3xl font-bold mb-6">
                    {{ __('Everything you need to learn geography') }}
                </h2>
                <p class="text-lg mb-12">
                    {{ __('Our platform combines interactive learning with community-driven content') }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <x-front.home.feature-card icon="heroicon-o-globe-europe-africa"
                                          title="{{ __('Official Geography Content') }}"
                                          text="{{ __('Expert-curated lessons about countries, capitals, and landmarks') }}"/>
                <x-front.home.feature-card icon="heroicon-o-flag"
                                          title="{{ __('Official Flag Studies') }}"
                                          text="{{ __('Learn vexillology and master national flags through our official content') }}"/>
                <x-front.home.feature-card icon="heroicon-o-book-open"
                                          title="{{ __('Community Quizzes') }}"
                                          :text="__('Create, share, and take quizzes made by fellow geography enthusiasts')"/>
                <x-front.home.feature-card icon="heroicon-o-user-group"
                                          title="{{ __('Knowledge Wiki') }}"
                                          text="{{ __('Access and contribute to both official and community-created geography guides') }}"/>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="bg-primary-50 py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">
                {{ __('Your Learning Journey') }}
            </h2>
            <p class="text-lg mb-12">
                {{ __('From official content to community contributions - learn and share your knowledge') }}
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <x-front.home.step-card icon="heroicon-o-check-circle"
                                       title="{{ __('1. Choose Your Path') }}"
                                       text="{{ __('Start with official content or explore community-created materials') }}"/>

                <x-front.home.step-card icon="heroicon-o-play"
                                       :title="__('2. Learn & Practice')"
                                       text="{{ __('Study through official wikis and test yourself with curated quizzes') }}"/>

                <x-front.home.step-card icon="heroicon-o-play"
                                       title="{{ __('3. Join the Community') }}"
                                       text="{{ __('Create your own quizzes and contribute to the knowledge base') }}"/>
            </div>
        </div>
    </section>
</x-layouts.front.base>
