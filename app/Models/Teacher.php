<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Teacher extends Model
{
    use HasFactory;
    protected $table='teachers';
    protected $fillable=[
        'name',
        'email',
        'unique_id',
        'phone',
        'dob',
        'gender',
        'password',
        'profile_image',
        'class_id',
        'school_id',
        'email_otp',
        'status',
        'fcm_token'
    ];
    public static function store(Request $request,$image=null){

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'profile_image'=>empty($image)?$request->p_image:$image,
            'status'=>$request->status,
            'unique_id'=>empty(!$request->unique)?$request->unique:explode('-',$request->dob)[0].substr($request->phone,0,5)
        ];
        if(isset($request->password))
        $data['password']=Hash::make($request->password);


        static::updateOrCreate(['id'=>$request->id],$data);


    }
}
