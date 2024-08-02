<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Livewire\Component;

class SettingsLanding extends Component
{
    public function render()
    {
        return view('livewire.dashboard.settings.settings-landing')
        ->layout('layouts.dashboard');
    }
}
