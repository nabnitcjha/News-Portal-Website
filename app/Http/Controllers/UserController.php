<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard()
    {
        // $userData = User::find(auth()->user()->id);
        return view('frontend.index');
    }

    public function UserLogin()
    {
        return view('frontend.user_login');
    }

    public function UserRegister()
    {
        return view('frontend.user_register');
    }

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/dashboard');
    }
}
