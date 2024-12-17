<div class="flex items-center relative w-full lg:w-auto"
     x-data="{
     open: false,
      }"
     @click.outside="open = false">
    <button x-on:click="open=!open"
            type="button"
            data-dropdown-toggle="language-dropdown-menu"
            class="inline-flex items-center w-full lg:w-auto font-medium justify-center px-4 py-2.5 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
        <x-dynamic-component :component="'icon.language.'.$this->currentLanguageTag" class="size-5 mr-2 rounded-lg" />
        {{ $this->currentLanguageName }}
    </button>
    <!-- Dropdown -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform scale-95 opacity-0"
         x-transition:enter-end="transform scale-100 opacity-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform scale-100 opacity-100"
         x-transition:leave-end="transform scale-95 opacity-0"
         x-cloak
         class="z-50 absolute lg:w-auto w-full top-7 right-1 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
        <ul class="py-2 font-medium" role="none">
            @foreach($this->availableLanguages as $languageName => $languageTag)
                <x-base.language.item :languageTag="$languageTag" :languageName="$languageName" wire:click="setLanguage('{{ $languageTag }}')" @click="open=false" />
            @endforeach
        </ul>
    </div>
</div>
