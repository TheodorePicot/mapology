<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Welcome, {{ auth()->user()->name }}!</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Your Stats</h2>
            <ul>
                <li class="mb-2">Quizzes Taken: {{ $userStats['total_quizzes_taken'] }}</li>
                <li class="mb-2">Average Score: {{ number_format($userStats['average_score'], 2) }}%</li>
                <li class="mb-2">Flags Learned: {{ $userStats['flags_learned'] }}</li>
                <li class="mb-2">Countries Learned: {{ $userStats['countries_learned'] }}</li>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Recent Quizzes</h2>
            <ul>
                @foreach ($recentQuizzes as $attempt)
                    <li class="mb-2">
{{--                        {{ $attempt->title }} - Score: {{ $attempt->score }}%--}}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Your Contributions</h2>
            <ul>
                <li class="mb-2">Quizzes Created: {{ $createdContent['quizzes'] }}</li>
                <li class="mb-2">Wikis Created: {{ $createdContent['wikis'] }}</li>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
            <div class="space-y-4">
                <a href="{{ route('quizzes.create') }}" class="block w-full bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600">Create Quiz</a>
                <a href="{{ route('wikis.create') }}" class="block w-full bg-green-500 text-white text-center py-2 rounded hover:bg-green-600">Create Wiki</a>
{{--                <a href="{{ route('quizzes.index') }}" class="block w-full bg-purple-500 text-white text-center py-2 rounded hover:bg-purple-600">Take a Quiz</a>--}}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Learning Progress</h2>
            <div x-data="{
                progress: {{ $userStats['countries_learned'] / 195 * 100 }},
                init() {
                    let counter = 0;
                    const target = this.progress;
                    const duration = 1500;
                    const step = timestamp => {
                        if (!start) start = timestamp;
                        const elapsed = timestamp - start;
                        counter = Math.min(elapsed / duration * target, target);
                        this.$refs.progress.style.width = `${counter}%`;
                        this.$refs.counter.textContent = `${Math.round(counter)}%`;
                        if (elapsed < duration) {
                            window.requestAnimationFrame(step);
                        }
                    };
                    let start = null;
                    window.requestAnimationFrame(step);
                }
            }">
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div x-ref="progress" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                    </div>
                    <div class="text-center">
                        <span x-ref="counter"></span> of countries learned
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Achievements</h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="text-center">
                    <svg class="w-8 h-8 mx-auto mb-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">Quiz Master</span>
                </div>
                <div class="text-center">
                    <svg class="w-8 h-8 mx-auto mb-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">Flag Expert</span>
                </div>
                <div class="text-center">
                    <svg class="w-8 h-8 mx-auto mb-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">Wiki Contributor</span>
                </div>
            </div>
        </div>
    </div>
</div>
