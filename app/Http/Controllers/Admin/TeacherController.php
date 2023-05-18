<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassCategory;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_id=Auth::user()->school->id;
       $data=Teacher::where('school_id',$school_id)->get();
       $title='Teachers List';
       return view('admin.pages.teachers.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title='Teacher Create';
        $class=ClassCategory::where('status',1)->get();
        return view('admin.pages.teachers.create',compact('title','class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:teachers,email,'.$request->id.',id,deleted_at,NULL|unique:users,email,'.$request->user_id.',id,deleted_at,NULL',
            'phone'=>'required|numeric|digits_between:10,12|unique:teachers,phone,'.$request->id.',id,deleted_at,NULL|unique:users,mobile,'.$request->user_id.',id,deleted_at,NULL',
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
        DB::rollBack();
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
        $class=ClassCategory::where('status',1)->get();
      return view('admin.pages.teachers.create',compact('result','title','class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Teacher $teacher)
    {
        $request->validate(
            [
                'newpassword'=>'required|min:8',
                'confirm_password'=>'required_with:newpassword|same:newpassword',
            ]
            );
         try
         {
            $teacher->password=Hash::make($request->newpassword);
            $teacher->save();
        User::where('id',$teacher->user_id)->update(['password'=>Hash::make($request->newpassword)]);

        return redirect()->route('teachers.index')->with('change','Password Change Successfully');

         }
         catch(\Exception $e)
         {
            $e->getMessage();
         }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $user=User::find($teacher->user_id);
        $user->delete();
        $teacher->delete();
        return redirect()->back();
    }
}
