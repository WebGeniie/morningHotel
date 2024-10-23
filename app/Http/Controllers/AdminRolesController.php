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
}
