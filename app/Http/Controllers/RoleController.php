<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles, 200);
    }

    
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role, 200);
    }
}
