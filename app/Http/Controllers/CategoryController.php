<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $result['data'] = Category::all();
        return view('admin/category', $result);
    }

    //    managing the edit and update from same function
    public function manage_category(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Category::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['category_name'] = $arr[0]->category_name;
            $result['category_slug'] = $arr[0]->category_slug;
        } else {
            $result['id'] = 0;
            $result['category_name'] = '';
            $result['category_slug'] = '';
        }
        return view('admin/manage_category',$result);
    }
    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories,category_slug,'.$request->post('id'),
        ]);
        
        if ($request->post('id') > 0) {
            $category = Category::find($request->post('id'));
            if (!$category) {
                // Optionally handle the case where the category is not found
                return redirect('admin/category')->withErrors('Category not found');
            }
            $msg = "Category Updated";
        } else {
            $category = new Category();
            $msg = "Category Inserted";
        }
        
        $category->category_name = $request->post('category_name');
        $category->category_slug = $request->post('category_slug');
        $category->status = 1;
        $category->save();
        
        $request->session()->flash('message', $msg);
        return redirect('admin/category');
        
    }

    public function delete(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete();
        $request->session()->flash('message', 'Category deleted');
        return redirect('admin/category');


    }

    public function status(Request $request,$status, $id)
    {
        $category = Category::find($id);
        $category->status=$status;
        $category->save();
        $request->session()->flash('message', 'Category Status Updated');
        return redirect('admin/category');


    }

}
