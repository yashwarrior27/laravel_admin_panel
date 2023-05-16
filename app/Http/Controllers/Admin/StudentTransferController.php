<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_id=Auth::user()->school->id;
       $title='Transfer Students List';
       $data=StudentTransfer::where('from_school_id',$school_id)->orWhere('to_school_id',$school_id)->get();
       return view('admin.pages.student_transfers.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Student Transfer Create';
        return view('admin.pages.student_transfers.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $school_id=Auth::user()->school->id;

        $request->validate([
           'unique_id'=>'required|exists:students,unique_id,school_id,!'.$school_id
            ]);
            try
            {
              DB::beginTransaction();
               StudentTransfer::store($request);
              DB::commit();
              return redirect()->route('student_transfers.index');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  StudentTransfer $studentTransfer)
    {
        try
        {
            DB::beginTransaction();

            $studentTransfer->status=$request->submit;
            $studentTransfer->save();

            if($request->submit=='success'){

               $student = Student::findOrFail($studentTransfer->student_id);

               $student->previous_school_id=$studentTransfer->from_school_id;
               $student->school_id=$studentTransfer->to_school_id;
               $student->save();

            }
            DB::commit();

            return redirect()->route('student_transfers.index');

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
