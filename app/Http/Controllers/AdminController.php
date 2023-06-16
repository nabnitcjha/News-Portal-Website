<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/logout/page');
    }

    public function AdminLogin(Request $request)
    {
        return view('admin.admin_login');
    }

    public function AdminLogoutPage(Request $request)
    {
        return view('admin.admin_logout');
    }

    public function AdminRegister(Request $request)
    {
        return view('admin.admin_register');
    }

    public function AdminProfile()
    {
        $adminData = User::find(auth()->user()->id);
        return view('admin.admin_profile', compact('adminData'));
    }

    public function AdminPasswordChangePage()
    {
        return view('admin.admin_password_change');
    }


    public function AdminPasswordChange()
    {
        return view('admin.admin_password_change');
    }

    public function AdminProfileUpdate(Request $request)
    {

        $adminData = User::find($request->user_id);
        $adminData->username = $request->username;
        $adminData->name = $request->name;
        if ($request->hasFile('avatar')) {
            $timestamp = date('YmdHi');
            $extention =$request->file('avatar')->extension();
            $filename = auth()->user()->id.'.'.$timestamp.'.'.$extention;
            $path = $request->file('avatar')->storeAs('avatars',$filename,'public');
            $adminData->photo = $path;
        }
        $adminData->save();

        // return back()->with('admin-updated', 'Success! Admin Updated Successfully');
        
        $notification = array(
            'message'=>'Admin Updated Successfully',
            'alert-type'=>'info'
        );

        return back()->with($notification);
        // return view('admin.admin_profile', compact('adminData','notification'));
    }
}
