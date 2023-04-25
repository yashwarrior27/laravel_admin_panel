<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=Teacher::all();
       $title='Teachers List';
       return view('admin.pages.teachers.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title='Teacher Create';
        return view('admin.pages.teachers.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:teachers,email,'.$request->id,
            'phone'=>'required|numeric|digits_between:10,12|unique:teachers,phone,'.$request->id,
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

        Teacher::store($request,$image);
        DB::commit();
        return redirect()->route('teachers.index');


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
    public function edit(Teacher $teacher)
    {
        $result=$teacher;
        $title='teacher Edit';
      return view('admin.pages.teachers.create',compact('result','title'));
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
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->back();
    }
}
