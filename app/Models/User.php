<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'unique_id',
        'dob',
        'gender',
        'profile_image',
        'user_type',
        'so_google',
        'email_otp',
        'status',
        'fcm_token',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }

    public function hasRole($id){

        return $this->roles()->where('role_id',$id)->first()?true:false;

    }
    public function school(){
        return $this->hasOne(SchoolManagement::class,'user_id','id');
    }

    public static function store(Request $request,$image=null){


        $data=[
            'name'=>$request->name,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'profile_image'=>empty($image)?$request->p_image:$image,
            'status'=>$request->status,
            'unique_id'=>empty(!$request->unique)?$request->unique:explode('-',$request->dob)[0].substr($request->phone,0,5).rand(100,999),
        ];

      return User::updateOrCreate(['id'=>$request->id],$data);
    }

}
