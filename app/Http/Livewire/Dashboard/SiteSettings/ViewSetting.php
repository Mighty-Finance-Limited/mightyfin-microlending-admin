<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use Livewire\Component;

class ViewSetting extends Component
{
    public function render()
    {
        return view('livewire.dashboard.site-settings.view-setting')
        ->layout('layouts.admin');
    }
}
