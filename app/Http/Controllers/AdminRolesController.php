<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class AdminRolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }
    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|max:255'
        ]);

        // dd($request->all());

        $roles = Role::create([
        'name' => $request->name,
        'description' => $request->description
        ]);

        return redirect()->route('admin.roles.index')->with('message', 'Roles created successfully');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }
    public function update(Request $request, Role $role)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
    
        // Update the role instance
        $role->name = $validated['name'];
        $role->description = $validated['description'];
        $role->updated_at = now(); // Update the updated_at field to the current timestamp
        $role->save(); // Save the changes to the database
    
        // Redirect back with a success message
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role) 
    {
        $role->delete();
        // Redirect back with a success message
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }
}
