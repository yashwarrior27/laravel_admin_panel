<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
      try{
        $school_id=Auth::user()->school->id;
        $title='Today Student Attendances';
        $data=Attendance::TodayAttendance($school_id);
        return view('admin.pages.ERP_managements.student_attendances.index',compact('title','data'));
      }
      catch(\Exception $e){
        return $e->getMessage();
      }
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
    public function show(string $id)
    {
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
    public function update($id)
    {
       try
       {
        $attendance=Attendance::find($id);
        $attendance->present=$attendance->present==1?0:1;
        $attendance->save();

        return redirect()->route('student_attendances.index');

       }
       catch(\Exception $e)
       {
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
