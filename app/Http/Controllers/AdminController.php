<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.dashboard');
    }

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/logout/page');
    }

    public function AdminLogin(Request $request){
        return view('admin.admin_login');
    }

    public function AdminLogoutPage(Request $request){
        return view('admin.admin_logout');
    }

    public function AdminRegister(Request $request){
        return view('admin.admin_register');
    }

    public function AdminProfile(){
        return view('admin.admin_profile');
    }
}

