<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use Livewire\Component;

class SystemSettings extends Component
{
    public function render()
    {
        return view('livewire.dashboard.site-settings.system-settings')
        ->layout('layouts.admin');
    }
}
