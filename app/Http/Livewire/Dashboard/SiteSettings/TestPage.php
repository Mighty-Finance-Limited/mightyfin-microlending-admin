<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use Livewire\Component;

class TestPage extends Component
{
    public function render()
    {
        return view('livewire.dashboard.site-settings.test-page')
        ->layout('layouts.admin');
    }
}
