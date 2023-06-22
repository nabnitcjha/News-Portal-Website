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
        $categories = Category::latest()->get();
        return view('admin.category_all', compact(['adminData','categories']));
    }

    public function CategoryAddPage()
    {
        $adminData = User::find(auth()->user()->id);
        return view('admin.category_add', compact('adminData'));
    }

    public function CategoryAdd(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = strtolower(str_replace(' ','-',$request->category_name));
        $category->save();

          $notification = array(
                'message'=>'Category Save Successfully',
                'alert-type'=>'warning'
            );
    
            return back()->with($notification);
    }
}
