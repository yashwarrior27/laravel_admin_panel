<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=Coupon::all();
       $title='Coupons List';
       return view('admin.pages.coupons.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Coupon Create';
        return view('admin.pages.coupons.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
              'coupon_code'=>'required|unique:coupons,coupon_code,'.$request->id,
              'coupon_details'=>'required',
              'valid_from'=>'required|date',
              'valid_to'=>'required|date|after:valid_from',
              'discount_type'=>'required|in:P,F',
              'amount'=>'required|numeric'
        ]);

        try
        {
           DB::beginTransaction();
           $faq=Coupon::store($request);
           DB::commit();
           return redirect()->route('coupons.index');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
         $result=$coupon;
         $title='Coupon Edit';
       return view('admin.pages.coupons.create',compact('result','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back();
    }
}
