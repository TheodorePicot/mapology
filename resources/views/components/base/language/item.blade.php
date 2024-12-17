<li  {{ $attributes }}>
    <div class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
        <div class="inline-flex items-center">
            <x-dynamic-component :component="'icon.language.'.$languageTag" class="size-5 mr-2 rounded-lg" />
            {{ $languageName }}
        </div>
    </div>
</li>
