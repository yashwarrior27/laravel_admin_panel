<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\SchoolManagement;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::where('id','>',1)->get();
        $title='Users List';
       return view('admin.pages.user_managements.users.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='User Create';
        $roles=Role::where('id','>',1)->get();
        return view('admin.pages.user_managements.users.create',compact('title','roles'));        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'dob'=>'nullable|date',
            'gender'=>'nullable|in:male,female,other',
    ]);

    try
    {
        DB::beginTransaction();

        $image=null;
        if(isset($request->profile_image))
        $image= $this->uploadDocuments($request->profile_image,public_path('images/profile_images/'));

       User::store($request,$image);
        DB::commit();
        return redirect()->route('users.index');
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
    public function edit(User $user)
    {
        $result=$user;
        $title='User Edit';
        $roles=Role::where('id','>',1)->get();
      return view('admin.pages.user_managements.users.create',compact('result','title','roles'));

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
    public function destroy(User $user)
    {
        if($user->roles[0]->id==4)
           Student::where('user_id',$user->id)->delete();
        if($user->roles[0]->id==3)
           Teacher::where('user_id',$user->id)->delete();
        if($user->roles[0]->id==2)
          SchoolManagement::where('user_id',$user->id)->delete();

        $user->delete();
        $user->save();
        return redirect()->back();

    }
}
