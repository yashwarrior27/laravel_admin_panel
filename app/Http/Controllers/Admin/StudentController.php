<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassCategory;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $school_id=Auth::user()->school->id;
       $data=Student::where('school_id',$school_id)->get();
       $title='Students List';
       return view('admin.pages.students.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title='Student Create';
        $class=ClassCategory::where('status',1)->get();
        return view('admin.pages.students.create',compact('title','class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:students,email,'.$request->id.',id,deleted_at,NULL|unique:users,email,'.$request->user_id.',id,deleted_at,NULL',
            'phone'=>'required|numeric|digits_between:10,12|unique:students,phone,'.$request->id.',id,deleted_at,NULL|unique:users,mobile,'.$request->user_id.',id,deleted_at,NULL',
            'dob'=>'required|date',
            'gender'=>'required|in:male,female,other',
            'password'=>'nullable|min:8',
            'confirm_password'=>'required_with:password|same:password',
    ]);

    try
    {
        DB::beginTransaction();

        $image=null;
        if(isset($request->profile_image))
        $image= $this->uploadDocuments($request->profile_image,public_path('images/profile_images/'));

        Student::store($request,$image);
        DB::commit();
        return redirect()->route('students.index');


    }
    catch(\Exception $e)
    {    DB::rollBack();
        return $e->getMessage();
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $result=$student;
        $title='Student Edit';
        $class=ClassCategory::where('status',1)->get();
      return view('admin.pages.students.create',compact('result','title','class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate(
            [
                'newpassword'=>'required|min:8',
                'confirm_password'=>'required_with:newpassword|same:newpassword',
            ]
            );
         try
         {
            $student->password=Hash::make($request->newpassword);
            $student->save();
        User::where('id',$student->user_id)->update(['password'=>Hash::make($request->newpassword)]);

        return redirect()->route('students.index')->with('change','Password Change Successfully');

         }
         catch(\Exception $e)
         {
            $e->getMessage();
         }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
         $user=User::find($student->user_id);
        $user->delete();
        $student->delete();
        return redirect()->back();
    }
}
