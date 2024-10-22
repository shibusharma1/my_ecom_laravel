<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $result['data'] = Color::all();
        return view('admin/color', $result);
    }

    //    managing the edit and update from same function
    public function manage_color(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Color::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['color'] = $arr[0]->color;
            $result['status'] = $arr[0]->status;
            
        } else {
            $result['id'] = 0;
            $result['color'] = '';
            $result['status'] = '';
            
        }
        return view('admin/manage_color',$result);
    }
    public function manage_color_process(Request $request)
    {
        $request->validate([
            
            'color' => 'required|unique:colors,color,'.$request->post('id'),
            

        ]);
        
        if ($request->post('id') > 0) {
            $color = Color::find($request->post('id'));
            if (!$color) {
                // Optionally handle the case where the color is not found
                return redirect('admin/color')->withErrors('Color not found');
            }
            $msg = "Color Updated";
        } else {
            $color = new Color();
            $msg = "Color Inserted";
        }
        
        $color->color = $request->post('color');
        
        $color->status = 1;
        $color->save();
        
        $request->session()->flash('message', $msg);
        return redirect('admin/color');
        
    }

    public function delete(Request $request, $id)
    {
        $color = Color::find($id);
        $color->delete();
        $request->session()->flash('message', 'Color deleted');
        return redirect('admin/color');


    }
    public function status(Request $request,$status, $id)
    {
        $category = Color::find($id);
        $category->status=$status;
        $category->save();
        $request->session()->flash('message', 'Category Status Updated');
        return redirect('admin/color');


    }
}
