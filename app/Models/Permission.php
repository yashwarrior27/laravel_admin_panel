<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Permission extends Model
{
    use HasFactory;
    protected $table='permissions';
    protected $fillable=['title','slug'];

    public function roles(){
        return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id');
    }

    public static function store(Request $request){

      return  static::updateOrCreate(['id'=>$request->id],[
           'title' =>$request->title,
           'slug' => Str::slug($request->title,'_'),
        ]);
    }
}
