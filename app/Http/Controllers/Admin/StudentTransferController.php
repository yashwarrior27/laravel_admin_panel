<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $title='Transfer Students List';
       $data=StudentTransfer::all();
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
        $request->validate([
           'unique_id'=>'required|exists:students,unique_id'
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
