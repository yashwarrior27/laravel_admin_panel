<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
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

    public static function ConvertLead(Addmission $addmission){

        $user=User::find($addmission->user_id);
        $user->roles()->sync(2);

      return   Student::Create([
            'name' =>!empty($addmission->student_info['name'])?$addmission->student_info['name']:$addmission->User->name,
            'email'=>$addmission->User->email,
            'phone'=>$addmission->User->mobile,
            'dob'=>date('Y-m-d',strtotime($addmission->student_info['dob'])),
            'gender'=>strtolower($addmission->student_info['gender']),
            'school_id'=>$addmission->applied_for_id,
            'unique_id'=>explode('-',date('Y-m-d',strtotime($addmission->student_info['dob'])))[0].substr($addmission->User->mobile,0,5).rand(100,999),
            'password'=>Hash::make($addmission->User->mobile.'@123'),
            'user_id'=>$addmission->user_id
        ]);


    }
}
