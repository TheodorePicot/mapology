<div class="flex flex-col items-center text center bg-white p-8 shadow-md rounded-lg">
    <div class="p-3 bg-primary-200 rounded-full w-fit mb-2">
        <x-dynamic-component :component="$icon" class="size-6 text-primary-800" />
    </div>
    <h3 class="text-xl font-semibold mb-2">{{ $title }}</h3>
    <p class="text-gray-600">{{ $text }}</p>
</div>