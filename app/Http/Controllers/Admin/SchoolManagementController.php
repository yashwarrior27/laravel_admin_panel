<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolManagement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SchoolManagementController extends Controller
{
    /**
     * Display a listing of the resource.
      */
      protected $AuthUser;

        public function __construct()
        {
            $this->AuthUser=Auth::user();
        }

    public function index()
    {
        $data=SchoolManagement::all();
        $title='Schools List';
        return view('admin.pages.school_managements.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->AuthUser->hasRole(1))
         return redirect()->back();

        $title='School Create';
        return view('admin.pages.school_managements.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
         'name'=>'required|string',
         'email'=>'required|email|unique:school_management,email,'.$request->id.',id,deleted_at,NULL|unique:users,email,'.$request->user_id.',id,deleted_at,NULL',
         'phone'=>'required|numeric|digits_between:10,12|unique:school_management,phone,'.$request->id.',id,deleted_at,NULL|unique:users,mobile,'.$request->user_id.',id,deleted_at,NULL',
         'password'=>'nullable|min:8',
         'confirm_password'=>'required_with:password|same:password',
         'address'=>'required|string',
         'open_time'=>'required',
         'close_time'=>'required',
         'info'=>'required|array',
         'top_students'=>'required|array',
         'achievements'=>'required|array',
         'fee_structure'=>'required|array',
         'gallery'=>'array'
         ]);

         try
         {
           DB::beginTransaction();
            SchoolManagement::store($request);
           DB::commit();
           return redirect()->route('school_managements.index');

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
    public function edit(SchoolManagement $schoolManagement)
    {
        $result=$schoolManagement;
        $title='School Edit';
      return view('admin.pages.school_managements.create',compact('result','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolManagement $schoolManagement)
    {
        $request->validate(
            [
                'newpassword'=>'required|min:8',
                'confirm_password'=>'required_with:newpassword|same:newpassword',
            ]
            );
         try
         {
        User::where('id',$schoolManagement->user_id)->update(['password'=>Hash::make($request->newpassword)]);

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
    public function destroy(SchoolManagement $schoolManagement)
    {
        if(!$this->AuthUser->hasRole(1))
         return redirect()->back();

        $user=User::find($schoolManagement->user_id);
        $user->delete();
        $schoolManagement->delete();
        return redirect()->back();
    }
}
