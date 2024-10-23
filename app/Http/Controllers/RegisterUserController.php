<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash; // Import Hash

class RegisterUserController extends Controller
{
    public function register() {
        return view('register');
    }
    public function store(Request $request) {
        $validate = $request->validate([
            'first_name' => 'required|string|max:10',
            'last_name' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:8',
            'phone_number' => 'required|min:9|max:20',
            'role_id' => 'nullable|exists:roles,id', // Allow role_id to be nullable
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);
        return to_route('staffs.application')->with('message', 'Your Application has been submitted and is under review.');
    }
}
