<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Coupon extends Model
{
    use HasFactory;
      protected $table = 'coupons';
    protected $fillable = [
        'coupon_code',
        'coupon_details',
        'valid_from',
        'valid_to',
        'discount_type',
        'max_reedem',
         'max_user',
         'max_discount',
         'amount',
         'status'];

    public static function store(Request $request)
    {

        return  static::updateOrCreate(
            ['id' => $request->id],
            [
                'coupon_code' => $request->coupon_code,
                'coupon_details' => $request->coupon_details,
                'valid_from' => $request->valid_from,
                'valid_to' => $request->valid_to,
                'discount_type' => $request->discount_type,
                'max_reedem' => empty($request->max_reedem)?0:$request->max_reedem,
                'max_user' => empty($request->max_user)?0:$request->max_user,
                'max_discount' => empty($request->max_discount)?0:$request->max_discount,
                'amount' => $request->amount,
                 'status'=>$request->status
            ]
        );
    }
}
