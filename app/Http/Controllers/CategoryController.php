<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
        return view('admin.category_all');
    }

    public function CategoryAdd()
    {
        return view('admin.category_add');
    }
}
