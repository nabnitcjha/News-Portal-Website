<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function UserHome()
    {
        return view('frontend.index');
    }

    public function userDashboard()
    {
        $userData = User::find(auth()->user()->id);
        return view('frontend.user_dashboard',compact('userData'));
    }

    public function UserLogin()
    {
        return view('frontend.user_login');
    }

    public function UserRegister()
    {
        return view('frontend.user_register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(auth()->user()->getRedirectRoute());
    }

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function UserProfileUpdate(Request $request)
    {
        $userData = User::find(auth()->user()->id);
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->phone = $request->phone;

        if ($request->hasFile('avatar')) {
            $timestamp = date('YmdHi');
            $extention =$request->file('avatar')->extension();
            $filename = auth()->user()->id.'.'.$timestamp.'.'.$extention;
            $path = $request->file('avatar')->storeAs('avatars',$filename,'public');
            $userData->photo = $path;
        }
        $userData->save();

        // return back()->with('admin-updated', 'Success! Admin Updated Successfully');
        
        $notification = array(
            'message'=>'User Updated Successfully',
            'alert-type'=>'info'
        );

        return back()->with($notification);
    }
}
