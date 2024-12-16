<div class="bg-primary-50 min-h-screen p-6">
    <div class="bg-white rounded-lg p-6 shadow mb-6 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="Profile Picture"
                class="rounded-full size-16 border-2 border-primary-400"
            />
            <div>
                <h1 class="text-2xl font-bold">Welcome back, {{ auth()->user()->username }}!</h1>
                <p class="text-gray-700">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <a href="{{ route('settings') }}" class="p-2 rounded-lg border border-gray-200 cursor-pointer transition duration-300 ease-in-out hover:bg-primary-100">
            <x-heroicon-o-cog-6-tooth class="size-5 text-primary-800"/>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <x-user.dashboard.explore-card title="Quizzes" icon="heroicon-o-book-open" description="Explore and take quizzes to test your knowledge"/>

        <x-user.dashboard.explore-card title="Wikis" icon="heroicon-o-book-open" description="Read and contribute to our knowledge base"/>
    </div>

    <div class="bg-white rounded-lg shadow mb-6">
        <div class="border-b p-4">
            <ul class="flex">
                <li class="mr-4 font-semibold text-green-600 border-b-2 border-green-600">Overview</li>
                <li class="text-gray-500">Achievements</li>
            </ul>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
            <div class="text-center">
                <h4 class="text-3xl font-bold">24</h4>
                <p class="text-gray-500">Total Quizzes Completed</p>
                <p class="text-green-500 text-sm">+2 from last week</p>
            </div>
            <div class="text-center">
                <h4 class="text-3xl font-bold">82%</h4>
                <p class="text-gray-500">Average Score</p>
                <p class="text-green-500 text-sm">+5% from last month</p>
            </div>
            <div class="text-center">
                <h4 class="text-3xl font-bold">48</h4>
                <p class="text-gray-500">Flags Mastered</p>
                <p class="text-gray-400 text-sm">Out of 195 countries</p>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Suggested -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Recent Quizzes -->
        <div class="bg-white rounded-lg p-6 shadow">
            <h3 class="font-semibold mb-4">Recent Quizzes</h3>
            <div class="space-y-4">
                <div>
                    <h4 class="font-medium">European Capitals</h4>
                    <p class="text-sm text-gray-500">Score: 8/10 | 2 hours ago</p>
                </div>
                <div>
                    <h4 class="font-medium">Asian Flags</h4>
                    <p class="text-sm text-gray-500">Score: 9/10 | 1 day ago</p>
                </div>
                <div>
                    <h4 class="font-medium">World Geography</h4>
                    <p class="text-sm text-gray-500">Score: 7/10</p>
                </div>
            </div>
        </div>

        <!-- Suggested for You -->
        <div class="bg-white rounded-lg p-6 shadow">
            <h3 class="font-semibold mb-4">Suggested for You</h3>
            <div class="space-y-4">
                <div>
                    <h4 class="font-medium">African Countries</h4>
                    <p class="text-sm text-gray-500">Difficulty: Medium | 10 mins</p>
                </div>
                <div>
                    <h4 class="font-medium">Understanding World Capitals</h4>
                    <p class="text-sm text-gray-500">Read time: 5 mins</p>
                </div>
                <div>
                    <h4 class="font-medium">South American Geography</h4>
                    <p class="text-sm text-gray-500">Difficulty: Hard | 15 mins</p>
                </div>
            </div>
        </div>

        <!-- Favorite Categories -->
        <div class="bg-white rounded-lg p-6 shadow">
            <h3 class="font-semibold mb-4">Favorite Categories</h3>
            <div class="space-y-4">
                <div>
                    <h4 class="font-medium">History</h4>
                    <p class="text-sm text-gray-500">12 quizzes | Last visited 2 days ago</p>
                </div>
                <div>
                    <h4 class="font-medium">Science</h4>
                    <p class="text-sm text-gray-500">8 articles | Last visited 1 day ago</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Content -->
    <div class="bg-white rounded-lg p-6 shadow-md">
        <h3 class="text-2xl font-semibold mb-4">Create Content</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-user.dashboard.create-card title="Create Quiz" icon="heroicon-o-book-open" description="Design interactive quizzes" button-text="New Quiz" href="{{ route('quizzes.create') }}"/>
            <x-user.dashboard.create-card title="Create Wiki" icon="heroicon-o-book-open" description="Share your knowledge" button-text="New Wiki" href="{{ route('wikis.create') }}"/>
        </div>
    </div>
</div>
