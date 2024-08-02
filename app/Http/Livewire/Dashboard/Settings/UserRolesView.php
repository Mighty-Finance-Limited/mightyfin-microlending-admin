<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolesView extends Component
{
    use AuthorizesRequests, WithPagination;
    public $role, $user_roles, $name, $role_name, $role_id, $rolePermissions;
    public $permission = [];
    public $show, $style;
    public $createModal = false;
    // public $checked = 'checked';

    public function render()
    {
        $this->authorize('view system settings');
        $this->user_roles = Role::pluck('name')->toArray();
        $permissions = Permission::whereNotNull('group')->get()->groupBy('group');

        // dd($this->permissions);
        $roles = Role::orderBy('id','DESC')->paginate(5);
        
        return view('livewire.dashboard.settings.user-roles-view', [
            'roles' => $roles,
            'permissions' => $permissions
        ])
        ->layout('layouts.admin');
    }

    public function store(){
        // $this->validate($request, [
        //     'name' => 'required|unique:roles,name',
        //     'permission' => 'required',
        // ]);
        try {
            $role = Role::create([
                'name' => $this->name,
                'guard_name' => 'web'
            ]);
            $role->syncPermissions($this->permission);
        
            Session::flash('attention', "New role created successfully.");
            $this->clearFields();
            return redirect()->route('roles');
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
            return redirect()->route('roles');
        }
    }

    public function show(Role $role)
    {
        $this->role = $role;
        $this->rolePermissions = $role->permissions;
    }

    public function edit(Role $role)
    {
        $this->name = $role->name;
        $this->role_id = $role->id;
        $this->rolePermissions = $role->permissions->pluck('name')->toArray();
        
        $this->show = 'true';
    }

    // Not in use
    public function updateRole(Role $role)
    {
        try {
            $this->validate([
                'name' => 'required',
                'permission' => 'required|array',
            ]);
            
            $role->update(['name' => $this->name]);
            $role->syncPermissions($this->permission);
            dd($this->permission);  
            Session::flash('attention', "Role updated successfully.");
            return redirect()->route('roles');
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
            return redirect()->route('roles');
        }
        // return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        Session::flash('attention', "Role deleted successfully.");
        
        return redirect()->route('roles');
    }

    // ------------------ Toggles
    public function toggleCreateModal(){
        $this->createModal = !$this->createModal;
        $this->clearFields();
    }

    public function closeModal(){
        $this->show = false;
        $this->role_name = '';
        $this->role_id = '';
        $this->rolePermissions = [];
        $this->render();
    }
    // ------------------ Clear
    public function clearEditModal(){
        $this->role = '';
        $this->rolePermissions = [];
    }

    public function clearFields(){
        $this->user_roles = []; 
        $this->permissions = []; 
        $this->name = '';
        $this->role = ''; 
        $this->rolePermissions = [];
    }
}
