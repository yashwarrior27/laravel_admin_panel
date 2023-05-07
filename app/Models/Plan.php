<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table='plans';

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
