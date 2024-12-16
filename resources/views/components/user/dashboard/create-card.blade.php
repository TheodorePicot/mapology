<!-- Create Wiki -->
<div class="group bg-white cursor-pointer rounded-lg p-6 border-2 border-dashed border-primary-200 flex flex-col gap-4 items-start transition duration-300 ease-in-out hover:shadow-sm hover:bg-primary-100">
    <div class="flex gap-4">
        <div>
            <div class="text-primary-600 group-hover:bg-primary-200  hover:text-primary-700 bg-primary-100 rounded-lg p-3 transition duration-300 ease-in-out">
                <x-dynamic-component :component="$icon" class="size-9" />
            </div>
        </div>
        <div>
            <h4 class="text-lg font-medium text-primary-800">{{ $title }}</h4>
            <p class="text-sm text-gray-400">{{ $description }}</p>
        </div>
    </div>
    <x-button href="{{ $href }}" variant="primary">
        {{ $buttonText }}
    </x-button>
</div>
