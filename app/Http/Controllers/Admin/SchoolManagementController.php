<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolManagement $schoolManagement)
    {
        $schoolManagement->delete();
        return redirect()->back();
    }
}
