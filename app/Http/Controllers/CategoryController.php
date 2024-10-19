<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $result['data'] = Category::all();
        return view('admin/category',$result);
    }

   
    public function manage_category()
    {
        return view('admin/manage_category');
    }
    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories',
        ]);
        $category = new Category();
        $category->category_name = $request->post('category_name');
        $category->category_slug = $request->post('category_slug');
        $category->save();
        $request->session()->flash('message','Category inserted');
        return redirect('admin/category');
    } 

    public function delete(Request $request){
        

    }

}
