<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
        $adminData = User::find(auth()->user()->id);
        $category = Category::latest()->get();
        return view('admin.category_all', compact(['adminData','category']));
    }

    public function CategoryAdd()
    {
        $adminData = User::find(auth()->user()->id);
        return view('admin.category_add', compact('adminData'));
    }
}
