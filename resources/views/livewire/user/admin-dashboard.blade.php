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

    <!-- Create Content -->
    <div class="bg-white rounded-lg p-6 shadow-md">
        <h3 class="text-2xl font-semibold mb-4">Official Content</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-user.dashboard.create-card title="Official Quizzes" icon="heroicon-o-book-open" description="With great power comes great responsibility" button-text="Create and modify the official quizzes" href="{{ route('quizzes.create') }}"/>
            <x-user.dashboard.create-card title="Official Wikis" icon="heroicon-o-book-open" description="With great knowledge comes great responsibility" button-text="Create and modify the official wikis" href="{{ route('wikis.create') }}"/>
        </div>
    </div>
</div>
