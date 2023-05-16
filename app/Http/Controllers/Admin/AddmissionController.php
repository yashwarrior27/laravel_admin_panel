<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addmission;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $school_id=Auth::user()->school->id;
        $data=Addmission::where('applied_for_id',$school_id)->get();
        $title='Leads List';
        return view('admin.pages.addmissions.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Addmission $addmission)
    {

        $title='View Lead';
        $result=$addmission;
        return view('admin.pages.addmissions.view',compact('title','result'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Addmission $addmission)
    {
        try
         {
            DB::beginTransaction();
            $addmission->status=1;
            $addmission->save();

            $addmission->ConvertLead($addmission);

            DB::commit();

            return redirect()->route('addmissions.index');

        }
        catch(\Exception $e)
        {
            DB::rollBack();
            return $e->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
