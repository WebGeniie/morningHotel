<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Hash; // Import Hash

class AdminStaffsController extends Controller
{
    public function index(){
        $staffs = User::all(); // assuming 'Staff' is your model
        return view('admin.staffs_list.index', compact('staffs')); // replace 'your_view_name' with your actual view file
    }

    public function create() {
        $roles = Role::all();  // Fetch all roles from the roles table
        $staffs = User::all();
        return view('admin.staffs_list.create', compact('roles', 'staffs'));
    }

    public function store(Request $request)
{
    // Debug the incoming request
    // dd($request->all());
    // Validate the form data
    $validated = $request->validate([
        'first_name' => 'required|string|max:10',
        'last_name' => 'required|string|max:10',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
        'phone_number' => 'required|min:9|max:20',
        'role_id' => 'required|exists:roles,id',  // Make role_id required
    ]);
    
    // Create the new user
    $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'password' => Hash::make($request->password),
        'phone_number' => $request->phone_number,
        'email' => $request->email,
        'role_id' => $request->role_id,  // Use the selected role from the form
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ]);

    return redirect()->route('admin.staffs_list.index')->with('message', 'Successfully created Staff.');
    // dd($request->role_id);
}


    

    public function edit(User $staff) {
        $roles = Role::all(); // Assuming you have a Role model
        $edit = true;  // This is for distinguishing create and edit mode
    
        // Pass the user (staff) and the roles to the view
        return view('admin.staffs_list.edit', compact('staff', 'roles', 'edit'));
    }

    public function update(Request $request, User $staff)
{
    // Validate the form data
    $validated = $request->validate([
        'first_name' => 'required|string|max:10',
        'last_name' => 'required|string|max:10',
        'email' => 'required|email|unique:users,email,' . $staff->id, // Allow the current email
        'phone_number' => 'required|min:9|max:20',
        'role_id' => 'nullable|exists:roles,id', // Allow role_id to be nullable
    ]);
    
    // Update the user
    $staff->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'password' => $request->password ? Hash::make($request->password) : $user->password, // Only hash if password is provided
        'phone_number' => $request->phone_number,
        'email' => $request->email,
        'role_id' => $request->role_id, // Set to new role_id or null
        'email_verified_at' => now(),
    ]);

    return redirect()->route('admin.staffs_list.index')->with('message', 'Successfully updated Staff.');
}

    


public function destroy(User $staff) 
{
    $staff->delete();

    return redirect()->route('admin.staffs_list.index')->with('message', 'Staff Deleted Successfully');
}
}
