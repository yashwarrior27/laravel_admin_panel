<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=Student::all();
       $title='Students List';
       return view('admin.pages.students.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title='Student Create';
        return view('admin.pages.students.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:students,email,'.$request->id,
            'phone'=>'required|numeric|digits_between:10,12|unique:students,phone,'.$request->id,
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
    {
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
      return view('admin.pages.students.create',compact('result','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back();
    }
}
