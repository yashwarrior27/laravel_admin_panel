<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Faq extends Model
{
    use HasFactory;

   protected $table='faqs';
   protected $fillable=['question','answer','status'];

   public static function store(Request $request){

    return  static::updateOrCreate(
        ['id'=>$request->id],[
        'question'=>$request->question,
        'answer'=>$request->answer,
        'status'=>$request->status
        ]);
   }
}
