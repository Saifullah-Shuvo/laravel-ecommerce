<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index',compact('coupons'));
    }

    public function add(){
        return view('admin.coupons.add');
    }

    public function store(Request $request){
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric',
            'expiry_date' => 'required|date|after:today',
            // 'expiry_date' => 'required|date_format:Y-m-d|after:today',
            'status' => 'required|numeric',
        ]);

        $coupons = new Coupon();
        $coupons->code = $request->code;
        $coupons->discount_type = $request->discount_type;
        $coupons->discount_value = $request->discount_value;
        $coupons->expiry_date = $request->expiry_date;
        $coupons->status = $request->status;
        $coupons->save();

        $notification = array('message' => "Coupon Stored Successfully!", 'alert-type' => 'success');
        return redirect()->route('coupon.all')->with($notification);
    }

    public function edit($id){
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit',compact('coupon'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric',
            'expiry_date' => 'date|after:today',
            // 'expiry_date' => 'required|date_format:Y-m-d|after:today',
            'status' => 'required|numeric',
        ]);

        $coupons = Coupon::findOrFail($id);
        $coupons->code = $request->code;
        $coupons->discount_type = $request->discount_type;
        $coupons->discount_value = $request->discount_value;
        $coupons->expiry_date = $request->expiry_date;
        $coupons->status = $request->status;
        $coupons->save();

        $notification = array('message' => "Coupon Updated Successfully!", 'alert-type' => 'success');
        return redirect()->route('coupon.all')->with($notification);
    }

    public function destroy($id){
        $coupons = Coupon::findOrFail($id);
        $coupons->delete();

        $notification = array('message' => "Coupon Deleted Successfully!", 'alert-type' => 'success');
        return redirect()->route('coupon.all')->with($notification);
    }

    // Coupon status
    public function status_enable($id)
    {
        $data = Coupon::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }

    public function status_disable($id)
    {
        $data = Coupon::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }

}
