<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentTransfer extends Model
{
    use HasFactory;

    protected $table='student_transfers';

    protected $fillable=[

        'student_id',
        'from_school_id',
        'to_school_id',
        'status'
    ];

    public function student(){
        return $this->hasOne(Student::class,'id','student_id');
    }
    public function fromSchool(){
        return $this->hasOne(SchoolManagement::class,'id','from_school_id');
    }

    public function toSchool(){
        return $this->hasOne(SchoolManagement::class,'id','to_school_id');
    }

    public static function store(Request $request)
    {
        $school_id=Auth::user()->school->id;
        $student=Student::where('unique_id',$request->unique_id)->first();

        return  static::updateOrCreate(
            ['id' => $request->id],
            [
               'student_id'=>$student->id,
               'from_school_id'=>$student->school_id,
                'to_school_id'=>$school_id //static
            ]
        );
    }
}
