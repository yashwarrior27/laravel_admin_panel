<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $table='email_templates';

    protected $fillable=['title','subject','content','status'];

 public static function store(Request $request){

    return static::updateOrCreate(
        ['id'=>$request->id],
    [
        'title' => $request->title,
        'subject'=> $request->subject,
        'content'=>$request->content,
        'status'=>$request->status,
    ]);

 }

}
