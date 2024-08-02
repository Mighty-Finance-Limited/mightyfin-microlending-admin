<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class UserUpdateView extends Component
{
    use AuthorizesRequests;
    public $user;
    public $user_role, $roles, $permissions;
    public function mount($id)
    {
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $this->roles = Role::all();
        $this->user = User::find($id);

    }
    public function render()
    {
        $this->authorize('view system settings');
        return view('livewire.dashboard.settings.user-update-view')
        ->layout('layouts.admin');
    }
}
