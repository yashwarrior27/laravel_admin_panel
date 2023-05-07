<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addmission extends Model
{
    use HasFactory;
    protected $table='addmissions';

    protected $fillable=[
        'applied_for',
        'applied_for_id',
        'user_id',
        'student_info',
        'residential_info',
        'prev_school_info',
        'father_info',
        'mother_info',
        'sibling_info',
        'status'
    ];

    public function getStudentInfoAttribute($value){
        return json_decode($value,true);
    }
    public function getResidentialInfoAttribute($value){
        return json_decode($value,true);
    }
    public function getPrevSchoolInfoAttribute($value){
            return json_decode($value,true);
    }
    public function getFatherInfoAttribute($value){
        return json_decode($value,true);
    }
    public function getMotherInfoAttribute($value){
        return json_decode($value,true);
    }
    public function getSiblingInfoAttribute($value){
        return json_decode($value,true);
    }

    public function User(){

        return $this->hasOne(User::class,'id','user_id');
    }
    public function AppliedFor(){

          return $this->hasOne(SchoolManagement::class,'id','applied_for_id');
    }
}
