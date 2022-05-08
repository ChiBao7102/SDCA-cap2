<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashbardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('tenantDashboard');
        } else {
            return view('adminDashboard');
        }
    }
    public function listTenant()
    {
        // $role = Role::select('id')->where('id', 2)->get();
        // $user = User::where('role', $role)->get();
        $tenants = User::whereRoleIs(['user'])->get();
        //dd($owners);

        return view('admin.listTenant', compact('tenants'));
    }
}
