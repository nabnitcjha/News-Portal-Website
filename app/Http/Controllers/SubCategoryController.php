<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryAddPage(){
        return view('admin.subcategory.sub_category_add');
    }

    public function SubCategoryAdd(Request $request){
        return view('admin.subcategory.sub_category_all');
    }
}
