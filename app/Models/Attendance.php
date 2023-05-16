<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Static_;

class Attendance extends Model
{
    use HasFactory;

    protected $table='attendances';
    protected $fillable=[
        'student_id',
        'class_id',
        'present',
        'status'
    ];

    public function student(){
       return $this->hasOne(Student::class,'id','student_id');
    }


    public static function TodayAttendance($school_id){

      $school =  SchoolManagement::with('students.attendance','students.class')->where('id',$school_id)->first();

      if(!$school)
      return throw new \ErrorException('Invalid school Id');

      return $school->students->filter(function($collect){return $collect->attendance()->whereDate('created_at',date('Y-m-d'))->first();});

    }

}
