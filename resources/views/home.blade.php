<x-layouts.front.base>
    @vite(['resources/css/globe.css', 'resources/js/globe.js'])
    <!-- Hero Section -->
    <section class="bg-primary-100 py-32">
        <div class="max-w-screen-2xl mx-auto flex flex-col items-center text-center md:flex-row md:text-left">
            <div class="md:w-1/2">
                <h1 class="text-4xl font-bold mb-4">Master Geography Through Interactive Learning</h1>
                <p class="text-lg mb-6">
                    Create and explore quizzes about countries, flags, and geography. Learn while
                    having fun and share your knowledge with others.
                </p>
                <div class="flex space-x-4">
                    <x-button href="{{ route('quizzes') }}">
                        Start Learning
                    </x-button>
                    <x-button href="{{ route('quizzes.create') }}" variant="primary-outline">
                        Create Quiz
                    </x-button>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center mt-8 md:mt-0">
                <!-- Replace with the flag icon -->
                <x-icon.globe-spinner/>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="max-w-screen-2xl p-8 mx-auto">
            <div class="text-center">
                <h2 class="text-3xl font-bold mb-6">Everything you need to learn geography</h2>
                <p class="text-lg mb-12">Our platform combines interactive learning with community-driven content</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <x-base.home.feature-card icon="heroicon-o-globe-europe-africa" title="Official Geography Content"
                                          text="Expert-curated lessons about countries, capitals, and landmarks"/>
                <x-base.home.feature-card icon="heroicon-o-flag" title="Official Flag Studies"
                                          text="Learn vexillology and master national flags through our official content"/>
                <x-base.home.feature-card icon="heroicon-o-book-open" title="Community Quizzes"
                                          text="Create, share, and take quizzes made by fellow geography enthusiasts"/>
                <x-base.home.feature-card icon="heroicon-o-user-group" title="Knowledge Wiki"
                                          text="Access and contribute to both official and community-created geography guides"/>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="bg-primary-50 py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Your Learning Journey</h2>
            <p class="text-lg mb-12">From official content to community contributions - learn and share your
                knowledge</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <x-base.home.step-card icon="heroicon-o-check-circle"
                                       title="1. Choose Your Path"
                                       text="Start with official content or explore community-created materials"/>

                <x-base.home.step-card icon="heroicon-o-play"
                                       title="2. Learn & Practice"
                                       text="Study through official wikis and test yourself with curated quizzes"/>

                <x-base.home.step-card icon="heroicon-o-play"
                                       title="3. Join the Community"
                                       text="Create your own quizzes and contribute to the knowledge base"/>
            </div>
        </div>
    </section>
</x-layouts.front.base>
