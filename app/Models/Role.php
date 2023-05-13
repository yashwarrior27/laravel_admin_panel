<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Role extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $fillable=['title'];

    public function permissions(){

        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'role_user','role_id','user_id');
    }

    public static function store(Request $request){

        return static::updateOrCreate(['id'=>$request->id],[
            'title'=>$request->title,
        ]);
    }

}
