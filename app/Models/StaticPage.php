<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaticPage extends Model
{
    use HasFactory;

    protected $table='static_pages';

    protected $fillable=['title','slug','content','status'];

    public static function store(Request $request){

        $data=[
            'title'=>$request->title,
            'content'=>$request->content,
            'status'=>$request->status
        ];

         if(empty($request->id))
           $data['slug']= Str::slug($request->title,'-');

        return  static::updateOrCreate(
            ['id'=>$request->id],$data);
       }
}
