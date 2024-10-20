<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $result['data'] = Coupon::all();
        return view('admin/coupon', $result);
    }

    //    managing the edit and update from same function
    public function manage_coupon(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Coupon::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['title'] = $arr[0]->title;
            $result['code'] = $arr[0]->code;
            $result['value'] = $arr[0]->value;
        } else {
            $result['id'] = 0;
            $result['title'] = '';
            $result['code'] = '';
            $result['value'] = '';
        }
        return view('admin/manage_coupon',$result);
    }
    public function manage_coupon_process(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'code' => 'required|unique:coupons,code,'.$request->post('id'),
            'value' => 'required',

        ]);
        
        if ($request->post('id') > 0) {
            $coupon = Coupon::find($request->post('id'));
            if (!$coupon) {
                // Optionally handle the case where the coupon is not found
                return redirect('admin/coupon')->withErrors('Coupon not found');
            }
            $msg = "Coupon Updated";
        } else {
            $coupon = new Coupon();
            $msg = "Coupon Inserted";
        }
        
        $coupon->title = $request->post('title');
        $coupon->code = $request->post('code');
        $coupon->value = $request->post('value');
        $coupon->save();
        
        $request->session()->flash('message', $msg);
        return redirect('admin/coupon');
        
    }

    public function delete(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        $request->session()->flash('message', 'Coupon deleted');
        return redirect('admin/coupon');


    }}
