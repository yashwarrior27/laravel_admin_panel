<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Teacher extends Model
{
    use HasFactory,SoftDeletes;
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
        'user_id',
        'email_otp',
        'status',
        'fcm_token'
    ];
    public static function store(Request $request,$image=null){

        $school_id=Auth::user()->school->id;

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->phone,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'profile_image'=>empty($image)?$request->p_image:$image,
            'status'=>$request->status,
            'unique_id'=>!empty($request->unique)?$request->unique:explode('-',$request->dob)[0].substr($request->phone,0,5).rand(100,999),
            'user_type'=>'teacher',
        ];
        if(isset($request->password))
        $data['password']=Hash::make($request->password);

       $user = User::updateOrCreate(['id'=>$request->user_id],$data);

       if(empty($request->user_id))
       $user->roles()->sync(3);

       $data['user_id']=$user->id;
       $data['phone']=$request->phone;
       $data['school_id']=$school_id;
       $data['class_id']=$request->class;

        static::updateOrCreate(['id'=>$request->id],$data);

    }
}
