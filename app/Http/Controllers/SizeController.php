<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $result['data'] = Size::all();
        return view('admin/size', $result);
    }

    //    managing the edit and update from same function
    public function manage_size(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Size::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['size'] = $arr[0]->size;
            $result['status'] = $arr[0]->status;
            
        } else {
            $result['id'] = 0;
            $result['size'] = '';
            $result['status'] = '';
            
        }
        return view('admin/manage_size',$result);
    }
    public function manage_size_process(Request $request)
    {
        $request->validate([
            
            'size' => 'required|unique:sizes,size,'.$request->post('id'),
            

        ]);
        
        if ($request->post('id') > 0) {
            $size = Size::find($request->post('id'));
            if (!$size) {
                // Optionally handle the case where the size is not found
                return redirect('admin/size')->withErrors('Size not found');
            }
            $msg = "Size Updated";
        } else {
            $size = new Size();
            $msg = "Size Inserted";
        }
        
        $size->size = $request->post('size');
        
        $size->status = 1;
        $size->save();
        
        $request->session()->flash('message', $msg);
        return redirect('admin/size');
        
    }

    public function delete(Request $request, $id)
    {
        $size = Size::find($id);
        $size->delete();
        $request->session()->flash('message', 'Size deleted');
        return redirect('admin/size');


    }
    public function status(Request $request,$status, $id)
    {
        $category = Size::find($id);
        $category->status=$status;
        $category->save();
        $request->session()->flash('message', 'Category Status Updated');
        return redirect('admin/size');


    }
}
