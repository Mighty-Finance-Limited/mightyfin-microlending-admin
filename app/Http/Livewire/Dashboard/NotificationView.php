<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class NotificationView extends Component
{
    public $notifications;

    public function render()
    {
        try {
            $this->notifications = auth()->user()->notifications()->get();
            return view('livewire.dashboard.notification-view')
            ->layout('layouts.dashboard');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
