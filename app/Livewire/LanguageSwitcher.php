<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LanguageSwitcher extends Component
{
    public $availableLanguages;

    public $currentLanguageName;
    public $currentLanguageTag;

    public function mount()
    {
        $this->availableLanguages = config('app.available_locales');
        $this->syncLanguage();
    }

    public function setLanguage($locale)
    {
        App::setLocale($locale);
        Session::put('locale', $locale);
        $this->syncLanguage();

        return redirect(request()->header('Referer'));
    }

    private function syncLanguage(): void
    {
        $this->currentLanguageTag = Session::get('locale', 'en');
        $this->currentLanguageName = array_flip($this->availableLanguages)[$this->currentLanguageTag];
    }
}
