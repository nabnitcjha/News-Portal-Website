<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDashboard()
    {
        // $userData = User::find(auth()->user()->id);
        return view('frontend.index');
    }
}
