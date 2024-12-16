<div class="group bg-white cursor-pointer rounded-lg p-6 shadow-md border-2 border-primary-100 flex items-center transition duration-300 ease-in-out hover:shadow-lg hover:border-primary-300">
    <div class="mr-4">
        <div class="text-primary-600 group-hover:bg-primary-200  hover:text-primary-700 bg-primary-100 rounded-lg p-3 transition duration-300 ease-in-out">
            <x-dynamic-component :component="$icon" class="size-9" />
        </div>
    </div>
    <div>
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
        <p class="text-gray-500">{{ $description }}</p>
    </div>
</div>
