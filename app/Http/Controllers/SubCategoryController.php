<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryAddPage(){
        $adminData = User::find(auth()->user()->id);
        $categories = Category::latest()->get();
        return view('admin.subcategory.sub_category_add', compact(['adminData','categories']));
    }

    public function SubCategoryAdd(Request $request){
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = strtolower(str_replace(' ','-',$request->subcategory_name));
        $subcategory->save();
        $adminData = User::find(auth()->user()->id);
        $categories = Category::latest()->get();
          $notification = array(
                'message'=>'Category Save Successfully',
                'alert-type'=>'warning'
            );

            return view('admin.subcategory.sub_category_all', compact(['adminData','categories']))->with($notification);
            // return redirect()->route('subcategory.all')->with($notification,compact(['adminData','categories']));
    }

    public function SubCategoryAll()
    {
        $adminData = User::find(auth()->user()->id);
        $subcategories = SubCategory::latest()->get();
        return view('admin.subcategory.sub_category_all', compact(['adminData','subcategories']));
    }
}
