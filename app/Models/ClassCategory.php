<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClassCategory extends Model
{
    use HasFactory;
    protected $table='class_categories';

    protected $fillable=['name','description','status'];

    public static function store(Request $request)
    {

        return  static::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'description'=>$request->description
            ]
        );
    }

}
