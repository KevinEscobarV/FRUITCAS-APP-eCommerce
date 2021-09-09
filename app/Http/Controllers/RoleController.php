<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
       return view('roles.index');
    }
    
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));

    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        session()->flash('flash.banner', 'El rol se creo con exíto');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('roles.index');

    }
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        session()->flash('flash.banner', 'El rol se actualizo con exíto');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('roles.edit', $role);
    }

    public function destroy(Role $role)
    {
       $role->delete();

       session()->flash('flash.banner', 'El rol se elimino con exíto');
       session()->flash('flash.bannerStyle', 'danger');
        
       return redirect()->route('roles.index', $role);

    }
}
