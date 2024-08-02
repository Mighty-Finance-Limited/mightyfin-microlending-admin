<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
// use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(8);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $role = Role::create([
                'name' => $request->toArray()['name'],
                'guard_name' => 'web'
            ]);
            $role->syncPermissions($request->toArray()['permission']);
        
            Session::flash('attention', "New role created successfully.");
            return redirect()->route('roles');
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
            return redirect()->route('roles');
        }

        // $role = Role::create($request->all());
        // $role->permissions()->sync($request->permissions);

        // return redirect()->route('admin.roles.edit', $role)->with('info', 'The role has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $role = Role::find($data['role_id']);
    
            // dd($data['role_id']);
            $request->validate([
                'name' => 'required',
            ]);
    
            $role->update(['name' => $data['name']]);
            $role->syncPermissions($data['permission']);
    
            // Assuming the update was successful
            return response()->json(['message' => 'Role updated successfully'], 200);
        } catch (\Exception $e) {
            // dd($e);
            // Handle any exceptions or errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('info', 'The role has been successfully deleted.');
    }
}
