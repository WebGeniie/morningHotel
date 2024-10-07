<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|string',
        ]);
    
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user(); // Eager load the role
    
            // Output the user details for debugging
            // dd($user->toArray()); 
    
            if ($user->role && $user->role->name === 'admin') {
                return redirect()->intended('admin.index');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have admin access.',
                ]);
            }
        } else {
            // If login attempt fails
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    
    
    public function logout(Request $request) {
        // Logout User
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');
    }
}
