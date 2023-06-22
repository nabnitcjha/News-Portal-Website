<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryAddPage(){
        return view('admin.subcategory.sub_category_add');
    }

    public function SubCategoryAdd(Request $request){
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->save();

          $notification = array(
                'message'=>'Category Save Successfully',
                'alert-type'=>'warning'
            );
    
            return redirect()->route('admin.subcategory.sub_category_all')->with($notification);
    }
}
